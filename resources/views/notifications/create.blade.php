@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Notification</h2>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
