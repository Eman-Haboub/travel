@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Add Payment</h2>

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="booking_id" class="form-label">Select Booking</label>
            <select name="booking_id" class="form-select" required>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}">Booking #: {{ $booking->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" min="0" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="method" class="form-label">Payment Method</label>
            <input type="text" name="method" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
