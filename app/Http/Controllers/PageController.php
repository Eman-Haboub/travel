<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\Ticket;

class PageController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->take(3)->get(); 
        $hotels = Hotel::latest()->take(6)->get();
        $reviews = Review::latest()->with('user')->take(6)->get();
        $tickets = Ticket::latest()->take(6)->get();

        return view('pages.home', compact('trips', 'hotels', 'reviews', 'tickets'));
    }


    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function FAQs()
    {
        return view('pages.faq');
    }

    public function Privacy()
    {
        return view('pages.privacy');
    }

    public function Terms()
    {
        return view('pages.terms');
    }
}
