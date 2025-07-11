@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Review</h1>

        @role('admin')
        <form action="{{ route('reviews.update', $review) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Trip</label>
                <select name="trip_id" class="form-control">
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}" @if($trip->id == $review->trip_id) selected @endif>
                            {{ $trip->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Rating</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ $review->rating }}">
            </div>

            <div class="mb-3">
                <label>Comment</label>
                <textarea name="comment" class="form-control">{{ $review->comment }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
        @endrole
    </div>
@endsection
