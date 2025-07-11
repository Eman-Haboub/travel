@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $hotel->name }}</h2>

    <div class="row align-items-center">
        <div class="col-md-6">
            @if($hotel->image)
                <img src="{{ $hotel->image }}"
                     class="img-fluid rounded shadow"
                     style="max-height: 350px; object-fit: cover; width: 100%;">
            @endif
        </div>

        <div class="col-md-6">
            <p><strong>📍 Location:</strong> {{ $hotel->location }}</p>
            <p><strong>📝 Description:</strong> {{ $hotel->description }}</p>

            <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Back to List</a>
             <a href="{{ route('hotel_booking.create') }}" class="btn btn-success mt-3">Booking</a>
        </div>
    </div>
</div>
@endsection
