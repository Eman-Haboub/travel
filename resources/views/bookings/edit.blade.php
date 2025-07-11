@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Booking</h2>

    @if(auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id())
        <div class="alert alert-danger">You are not authorized to edit this booking.</div>
    @else
        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="booking_type" class="form-label">Booking Type</label>
                <input type="text" name="booking_type" class="form-control" value="{{ $booking->booking_type }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif
</div>
@endsection
