@extends('layout.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Ticket Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $ticket->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $ticket->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($ticket->price, 2) }}</p>
            <p class="card-text"><strong>Available:</strong> {{ $ticket->available ? 'Yes' : 'No' }}</p>
        </div>
    </div>
    <a href="{{ route('tickets.index') }}" class="btn btn-secondary mt-3">Back to list</a>
</div>
@endsection
