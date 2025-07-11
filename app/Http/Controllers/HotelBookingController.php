<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // الكل لازم يسجل دخول
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->hasAnyRole(['admin', 'supervisor'])) {
            // المشرف أو الأدمن يرى جميع الحجوزات
            $bookings = HotelBooking::with(['hotel', 'user'])->latest()->get();
        } else {
            // المستخدم العادي يرى حجوزاته فقط
            $bookings = HotelBooking::with(['hotel', 'user'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('hotel_booking.index', compact('bookings'));
    }

    public function show(HotelBooking $hotelBooking)
    {
        $user = auth()->user();

        if (!$user->hasAnyRole(['admin', 'supervisor']) && $hotelBooking->user_id !== $user->id) {
            abort(403, 'غير مصرح لك بعرض هذا الحجز.');
        }

        return view('hotel_booking.show', compact('hotelBooking'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('hotel_booking.create', compact('hotels'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'hotel_id' => 'required|exists:hotels,id',
        'room_type' => 'required|string',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date|after:check_in_date',
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    $userId = auth()->id();

    // 🟢 1. أنشئ سجل في جدول bookings
    $booking = HotelBooking::create([
        'user_id' => $userId,
        'status' => $validated['status'],
        // أضف أي حقول أخرى حسب جدولك
    ]);

    // 🟢 2. أنشئ سجل في جدول hotelbookings مع تمرير booking_id
    HotelBooking::create([
        'booking_id' => $booking->id,
        'hotel_id' => $validated['hotel_id'],
        'user_id' => $userId,
        'room_type' => $validated['room_type'],
        'check_in_date' => $validated['check_in_date'],
        'check_out_date' => $validated['check_out_date'],
        'status' => $validated['status'],
    ]);

    return redirect()->route('hotel_booking.index')->with('success', 'Booking created successfully.');
}

    public function edit(HotelBooking $hotelBooking)
    {
        $user = auth()->user();

        if (!$user->hasAnyRole(['admin', 'supervisor']) && $hotelBooking->user_id !== $user->id) {
            abort(403, 'غير مصرح لك بتعديل هذا الحجز.');
        }

        $hotels = Hotel::all();
        return view('hotel_booking.edit', compact('hotelBooking', 'hotels'));
    }

    public function update(Request $request, HotelBooking $hotelBooking)
    {
        $user = auth()->user();

        if (!$user->hasAnyRole(['admin', 'supervisor']) && $hotelBooking->user_id !== $user->id) {
            abort(403, 'غير مصرح لك بتحديث هذا الحجز.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel_id' => 'required|exists:hotels,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $hotelBooking->update($request->all());

        return redirect()->route('hotel_booking.index')->with('success', 'تم تحديث بيانات الحجز');
    }

    public function destroy(HotelBooking $hotelBooking)
    {
        $user = auth()->user();

        if (!$user->hasAnyRole(['admin', 'supervisor']) && $hotelBooking->user_id !== $user->id) {
            abort(403, 'غير مصرح لك بحذف هذا الحجز.');
        }

        $hotelBooking->delete();
        return redirect()->route('hotel_booking.index')->with('success', 'تم حذف الحجز');
    }
}
