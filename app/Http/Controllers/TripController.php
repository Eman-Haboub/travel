<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
        $this->middleware('auth')->only('book');

    }

    public function index()
    {
        $trips = Trip::latest()->get();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'price' => ['required', 'numeric', 'min:200', 'max:550']
        ]);

        $imagePath = $request->file('image')
            ? $request->file('image')->store('trips', 'public')
            : null;

        Trip::create([
            'destination' => $request->destination,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imagePath,
            'price' => $request->price,

        ]);

        return redirect()->route('trips.index')->with('success', 'تمت إضافة الرحلة بنجاح.');
    }

    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'price' => ['required', 'numeric', 'min:200', 'max:550']

        ]);

        if ($request->hasFile('image')) {
            if ($trip->image && Storage::disk('public')->exists($trip->image)) {
                Storage::disk('public')->delete($trip->image);
            }

            $trip->image = $request->file('image')->store('trips', 'public');
        }

        $trip->update([
            'destination' => $request->destination,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $trip->image,
            'price' => $request->price,

        ]);

        return redirect()->route('trips.index')->with('success', 'تم تحديث بيانات الرحلة.');
    }

    public function destroy(Trip $trip)
    {
        if ($trip->image && Storage::disk('public')->exists($trip->image)) {
            Storage::disk('public')->delete($trip->image);
        }

        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'تم حذف الرحلة.');
    }
    public function book(Trip $trip)
{
    return redirect()->back()->with('success', 'تم حجز الرحلة بنجاح.');
}

}
