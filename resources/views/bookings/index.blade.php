@extends('layout.app')

@section('content')
<div class="container">
    <h2>Booking List</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Create New Booking</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Booking Type</th>
                <th>Trip Name</th>
                @if(auth()->user()->role === 'admin')
                <th>User</th>
                @endif
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->booking_type }}</td>
                <td>{{ $booking->trip_id }}</td>
                @if(auth()->user()->role === 'admin')
                <td>{{ $booking->user->name ?? 'Unknown' }}</td>
                @endif
                <td>
                    <a href="{{ route('bookings.show', $booking) }}" class="btn btn-sm btn-info">View</a>

                    @if(auth()->user()->role === 'admin' || $booking->user_id === auth()->id())
                        <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No bookings available currently.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
