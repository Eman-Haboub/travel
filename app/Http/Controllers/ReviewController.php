<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Trip;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
    }

    public function index()
    {
        $reviews = Review::with(['trip', 'user'])->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('reviews.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'trip_id' => $request->trip_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'تم إضافة التقييم بنجاح');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $trips = Trip::all();
        return view('reviews.edit', compact('review', 'trips'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'تم تعديل التقييم بنجاح');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'تم حذف التقييم بنجاح');
    }
}
