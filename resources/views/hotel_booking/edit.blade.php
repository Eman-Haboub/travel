@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Hotel Booking</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotel_booking.update', $hotelBooking) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-select" required>
                <option value="">Select Hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ $hotelBooking->hotel_id == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in Date</label>
            <input type="date" name="check_in" id="check_in" class="form-control" value="{{ $hotelBooking->check_in }}" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out Date</label>
            <input type="date" name="check_out" id="check_out" class="form-control" value="{{ $hotelBooking->check_out }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ $hotelBooking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $hotelBooking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $hotelBooking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('hotel-_booking.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
