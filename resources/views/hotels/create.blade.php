@extends('layout.app')

@section('title', 'Add New Hotel')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">➕ Add New Hotel</h2>

    {{-- عرض الأخطاء --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Hotel Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control"
                   value="{{ old('location') }}" required>
        </div>

        <div class="mb-3">
            <label for="stars" class="form-label">Stars (1 to 5)</label>
            <input type="number" name="stars" id="stars" class="form-control"
                   value="{{ old('stars', 3) }}" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hotel Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Add Hotel</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
