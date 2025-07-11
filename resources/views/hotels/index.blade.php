@extends('layout.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Hotels</h2>

       @role('admin')
    <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">➕ Add Hotel</a>
@endrole


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        @if ($hotel->image)
                            <img src="{{ $hotel->image }}" class="card-img-top"
                                style="height: 200px; width: 100%; object-fit: cover; object-position: center;"
                                alt="Hotel Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <p class="card-text">{{ Str::limit($hotel->description, 100) }}</p>
                            <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-outline-info btn-sm">View Details</a>
@auth
    <a href="{{ route('hotel_booking.create', $hotel) }}" class="btn btn-outline-success btn-sm">Book Now</a>
@else
    <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm"
       onclick="return confirm('You need to log in to book. Do you want to log in now?')">Book Now</a>
@endauth
                            @role('admin')
                                <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
