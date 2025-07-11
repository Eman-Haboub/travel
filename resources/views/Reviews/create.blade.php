@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Add New Review</h1>

        @role('admin')
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Trip</label>
                <select name="trip_id" class="form-control">
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Rating (1 to 5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5">
            </div>

            <div class="mb-3">
                <label>Comment (Optional)</label>
                <textarea name="comment" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endrole
    </div>
@endsection
