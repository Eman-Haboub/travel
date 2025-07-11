<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Hotel;
use App\Models\Ticket;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query   = $request->input('destination');
        $date    = $request->input('date');
        $service = $request->input('service');

        if (!$service) {
            return redirect()->back()->with('error', 'يرجى اختيار نوع الخدمة.');
        }

        $results = collect();


        if ($service == 'trip') {
            $results = Trip::query();
            if ($query) {
                $results->where('destination', 'LIKE', '%' . $query . '%');
            }
            if ($date) {
                $results->whereDate('departure_date', $date);
            }
            $results = $results->get();
        } elseif ($service == 'hotel') {
            $results = Hotel::query();
            if ($query) {
                $results->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('location', 'LIKE', '%' . $query . '%');
            }
            $results = $results->get();
        } elseif ($service == 'ticket') {
            $results = Ticket::query();
            if ($query) {
                $results->where('destination', 'LIKE', '%' . $query . '%');
            }
            if ($date) {
                $results->whereDate('travel_date', $date);
            }
            $results = $results->get();
        } else {
            return redirect()->back()->with('error', 'يرجى اختيار نوع الخدمة الصحيح.');
        }

        return view('search.index', compact('results', 'service', 'query', 'date'));
    }
}
