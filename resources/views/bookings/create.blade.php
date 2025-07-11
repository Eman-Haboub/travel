@extends('layout.app')

@section('content')
@php
    $trips = $trips ?? collect();
    $trip = $trip ?? null;
@endphp

<div class="container mt-5">
    <h2 class="mb-4">Create New Booking</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="trip_id" class="form-label">Select Trip</label>
            <select name="trip_id" id="trip_id" class="form-select" required>
                <option value="">-- Select a Trip --</option>

                @if($trip)
                    <option value="{{ $trip->id }}" selected>
                        {{ $trip->destination }} – From {{ $trip->start_date }} to {{ $trip->end_date }} – {{ $trip->price }} SAR
                    </option>
                @endif

                @foreach($trips as $tripItem)
                    @if(!$trip || $tripItem->id !== $trip->id)
                        <option value="{{ $tripItem->id }}">
                            {{ $tripItem->destination }} – From {{ $tripItem->start_date }} to {{ $tripItem->end_date }} – {{ $tripItem->price }} SAR
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="booking_type" class="form-label">Booking Type</label>
            <select name="booking_type" id="booking_type" class="form-select" required>
                <option value="">-- Select Booking Type --</option>
                <option value="flight">Flight</option>
                <option value="hotel">Hotel</option>
                <option value="package">Travel Package</option>
                <option value="tour">Tour</option>
                <option value="cruise">Cruise</option>
                <option value="experience">Tourist Experience</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
