@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Create Hotel Booking</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hotel_booking.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">User</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Booking ID</label>
                <input type="text" class="form-control" value="" disabled>
            </div>

            <div class="mb-3">
                <label for="hotel_id" class="form-label">Hotel</label>

                <select name="hotel_id" id="hotel_id" class="form-select" required>
                    <option value="">Select Hotel</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="room_type" class="form-label">Room Type</label>
                <select name="room_type" id="room_type" class="form-select" required>
                    <option value="">Select Room Type</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Standard">Standard</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Booking Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" selected>Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Book</button>
            <a href="{{ route('hotel_booking.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
