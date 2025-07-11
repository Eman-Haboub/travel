@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Booking Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">Booking Information</div>
        <div class="card-body">
            <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
            <p><strong>Booking Type:</strong> {{ $booking->booking_type }}</p>
            <p><strong>User:</strong> {{ $booking->user->name }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">Trip Details</div>
        <div class="card-body">
            <p><strong>Trip Name:</strong> {{ $booking->trip->destination }}</p>
            <p><strong>Trip Date:</strong> {{ $booking->trip->start_date  }}</p>
            <p><strong>Description:</strong> {{ $booking->trip->description }}</p>
        </div>
    </div>

    <a href="{{ route('trips.index') }}" class="btn btn-secondary mt-3">Back to Trips List</a>
</div>
@endsection
