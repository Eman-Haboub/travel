@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>Payment Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Booking ID:</strong> {{ $payment->booking->id ?? 'Not Available' }}</p>
            <p><strong>User:</strong> {{ $payment->users->name ?? 'Not Available' }}</p>
            <p><strong>Amount:</strong> {{ $payment->amount }} $</p>
            <p><strong>Payment Method:</strong> {{ $payment->method }}</p>
            <p><strong>Status:</strong> {{ $payment->status }}</p>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
