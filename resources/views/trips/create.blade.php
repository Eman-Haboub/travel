@extends('layout.app')

@section('title', 'Create New Trip')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">➕ Create New Trip</h2>

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

        <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Trip Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" name="destination" id="destination" class="form-control"
                    value="{{ old('destination') }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (USD)</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}"
                    step="0.01" min="0">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Trip Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}"
                    required>
            </div>


            <button type="submit" class="btn btn-primary">Create Trip</button>
            <a href="{{ route('trips.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
