@extends('layout.app')

@section('title', 'Trip Details')

@section('content')
<div class="container py-4">
    <h2>{{ $trip->name }}</h2>
    <p><strong>Destination:</strong> {{ $trip->destination }}</p>
    <p><strong>Price:</strong> ${{ $trip->price }}</p>
    <p><strong>Start Date:</strong> {{ $trip->start_date }}</p>
    <p><strong>End Date:</strong> {{ $trip->end_date }}</p>
    <p><strong>Description:</strong> {{ $trip->description }}</p>

    <a href="{{ route('trips.index') }}" class="btn btn-secondary mt-3">Back to Trips</a>
    <a href="{{ route('bookings.create', ['trip_id' => $trip->id]) }}" class="btn btn-success mt-3">Booking </a>


</div>
@endsection
