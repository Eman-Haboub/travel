@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Payment List</h2>
        @role('admin')
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
        @endrole
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Booking</th>
                <th>User</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->booking->id ?? 'Not Available' }}</td>
                <td>{{ $payment->user->name ?? 'Not Available' }}</td>
                <td>{{ $payment->amount }} $</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->status }}</td>
                <td>
                    <a href="{{ route('payments.show', $payment) }}" class="btn btn-info btn-sm">View</a>

                    @role('admin')
                    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endrole
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
