<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\User;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
        $this->middleware('auth')->only(['index', 'show']);
    }

    public function index()
    {
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            $payments = Payment::with(['booking', 'user'])->latest()->get();
        } else {
            $payments = Payment::where('user_id', $user->id)
                ->with(['booking', 'user'])
                ->latest()
                ->get();
        }

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::all();
        return view('payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|string',
            'status' => 'required|in:pending,completed,failed',
        ]);

        Payment::create([
            'booking_id' => $request->booking_id,
            'user_id' => auth()->id(), 
            'amount' => $request->amount,
            'method' => $request->method,
            'status' => $request->status,
        ]);

        return redirect()->route('payments.index')->with('success', 'تمت إضافة الدفع بنجاح');
    }

    public function show(Payment $payment)
    {
        $user = auth()->user();

        if ($user && !$user->hasRole('admin') && $payment->user_id !== $user->id) {
            abort(403); // منع عرض دفعة لا تخص المستخدم
        }

        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::all();
        return view('payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|string',
            'status' => 'required|in:pending,completed,failed',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'تم تحديث الدفع بنجاح');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'تم حذف الدفع بنجاح');
    }
}
