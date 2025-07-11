<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
    }

    public function index()
    {
        $hotels = Hotel::latest()->get();
        return view('hotels.index', compact('hotels'));
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $imagePath = $request->file('image')
            ? $request->file('image')->store('hotels', 'public')
            : null;

        Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('hotels.index')->with('success', 'تمت إضافة الفندق بنجاح.');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($hotel->image && Storage::disk('public')->exists($hotel->image)) {
                Storage::disk('public')->delete($hotel->image);
            }

            $hotel->image = $request->file('image')->store('hotels', 'public');
        }

        $hotel->update([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $hotel->image,
        ]);

        return redirect()->route('hotels.index')->with('success', 'تم تحديث بيانات الفندق.');
    }

    public function destroy(Hotel $hotel)
    {
        if ($hotel->image && Storage::disk('public')->exists($hotel->image)) {
            Storage::disk('public')->delete($hotel->image);
        }

        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'تم حذف الفندق.');
    }
}
