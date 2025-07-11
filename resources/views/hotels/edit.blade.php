@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Hotel Information</h2>

    <form action="{{ route('hotels.update', $hotel) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Hotel Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $hotel->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $hotel->location) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $hotel->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">New Hotel Image (Optional)</label>
            <input type="file" name="image" class="form-control">
            @if($hotel->image)
                <img src="{{ asset('storage/' . $hotel->image) }}" class="img-fluid mt-2" style="max-height: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
