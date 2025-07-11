<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'غير مصرح لك بالدخول إلى هذه الصفحة.');
        }

        $totalBookings = Booking::count();
          $totalUsers = User::role('user')->count();
        $totalTrips = Trip::count();

        return view('admin.dashboard', compact('totalBookings', 'totalUsers', 'totalTrips'));
    }

}
