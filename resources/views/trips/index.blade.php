@extends('layout.app')

@section('title', 'All Trips')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Available Trips</h2>

        @can('create trips')
            <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">+ Create New Trip</a>
        @endcan

        <div class="row">
            @foreach ($trips as $trip)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if ($trip->image)
                            <img src="{{ $trip->image ?? asset('images/default.jpg') }}" class="card-img-top"
                                style="height:200px; object-fit:cover;" alt="{{ $trip->destination }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $trip->name }}</h5>
                            <p class="card-text">Destination: {{ $trip->destination }}</p>
                            <p class="card-text">Price: ${{ $trip->price ?? 'Not available' }}</p>
                            <a href="{{ route('trips.show', $trip) }}" class="btn btn-outline-primary">View</a>
                            <a href="{{ route('bookings.create', ['trip_id' => $trip->id]) }}" class="btn btn-success"> Booking</a>


                            @role('admin')
                                <a href="{{ route('trips.edit', $trip) }}" class="btn  btn-warning">Edit</a>
                                <form action="{{ route('trips.destroy', $trip) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endrole
                          <form method="POST" action="{{ route('tickets.show', $trip->id) }}">
    @csrf
</form>


                        </div>
                    </div>
                </div>
            @endforeach
        @endsection
