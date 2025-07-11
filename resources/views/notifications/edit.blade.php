@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Notification</h2>

    <form action="{{ route('notifications.update', $notification) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $notification->title }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ $notification->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
