@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Hotel Booking List</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Hotel</th>
                        <th>User</th>
                        <th>Room</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- booking_id hotel_id 'room_type --}}
                    @forelse($bookings as $booking)
                        @if (auth()->user()->hasRole('admin') || $booking->user_id === auth()->id())
                            <tr class="text-center align-middle">
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->hotel->name }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->room_type }}</td>
                                <td>{{ $booking->check_in_date }}</td>
                                <td>{{ $booking->check_out_date }}</td>
                                <td>
                                    @if ($booking->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($booking->status == 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('hotel_booking.show', $booking) }}"
                                        class="btn btn-info btn-sm">View</a>

                                    @role('admin')
                                        <a href="{{ route('hotel_booking.edit', $booking) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('hotel_booking.destroy', $booking) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endrole
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
