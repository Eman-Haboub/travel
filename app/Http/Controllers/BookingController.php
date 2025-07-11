<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\User;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $bookings = Booking::latest()->get();
        } else {
            $bookings = Booking::where('user_id', auth()->id())->latest()->get();
        }

        return view('bookings.index', compact('bookings'));
    }

public function create(Request $request)
{
    $trip = null;
    $trips = Trip::all();

    if ($request->has('trip_id') && $request->trip_id) {
        $trip = Trip::find($request->trip_id);
        if ($trip) {
            $trips = collect([$trip]);
        }
    }

    return view('bookings.create', [
        'trip' => $trip,
        'trips' => $trips
    ]);
}




    public function store(Request $request)
{
    $request->validate([
        'trip_id'      => 'required|exists:trips,id',
        'booking_type' => 'required|string|max:50',
    ]);

    $booking = Booking::create([
        'trip_id'      => $request->trip_id,
        'booking_type' => $request->booking_type,
        'user_id'      => auth()->id(),
    ]);

    return redirect()->route('bookings.show', $booking->id)->with('success', 'تم تأكيد الحجز بنجاح.');
}


    public function show(Booking $booking)
    {
        if (auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك.');
        }

        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        if (auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك.');
        }

        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        if (auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك.');
        }

        $request->validate([
            'booking_type' => 'required|string|max:50',
        ]);

        $booking->update([
            'booking_type' => $request->booking_type,
        ]);

        return redirect()->route('bookings.index')->with('success', 'تم تحديث الحجز.');
    }

    public function destroy(Booking $booking)
    {
        if (auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك.');
        }

        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'تم حذف الحجز.');
    }
}
