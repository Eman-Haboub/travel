@extends('layout.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Ticket</h2>
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $ticket->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $ticket->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $ticket->price }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Available</label>
            <select name="available" class="form-select">
                <option value="1" {{ $ticket->available ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$ticket->available ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
