@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">My Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Trip</th>
                        <th>Ticket Code</th>
                        <th>Issue Date</th>
                        <th>Valid From</th>
                        <th>Valid To</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            {{-- booking_id user_id trip_id ticket_code issue_date valid_from valid_to qr_code_url --}}
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->user->name }}</td>
                            <td>{{ $ticket->trip->destination }}</td>
                            <td>{{ $ticket->ticket_code }}</td>
                            <td>{{ $ticket->issue_date }}</td>
                            <td>{{ $ticket->valid_from }}</td>
                            <td>{{ $ticket->valid_to }}</td>
                            <td>{{ $ticket->trip->price }}$</td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">View</a>

                                @role('admin')
                                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
