@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Hotel Booking Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hotel: {{ $hotelBooking->hotel->name ?? '-' }}</h5>
            <p class="card-text"><strong>User:</strong> {{ $hotelBooking->user->name ?? '-' }}</p>
            <p class="card-text"><strong>Check-in:</strong> {{ $hotelBooking->check_in }}</p>
            <p class="card-text"><strong>Check-out:</strong> {{ $hotelBooking->check_out }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $hotelBooking->status }}</p>

            <a href="{{ route('hotel_booking.index') }}" class="btn btn-secondary">Back</a>
            @role('admin')
                <a href="{{ route('hotel_booking.edit', $hotelBooking) }}" class="btn btn-warning">Edit</a>
            @endrole
        </div>
    </div>
</div>
@endsection
