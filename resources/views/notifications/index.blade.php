@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notification List</h2>

        @role('admin')
            <a href="{{ route('notifications.create') }}" class="btn btn-primary">New Notification</a>
        @endrole
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ $notification->title }}</td>
                <td>{{ Str::limit($notification->message, 50) }}</td>
                <td>
                    <a href="{{ route('notifications.show', $notification) }}" class="btn btn-info btn-sm">View</a>

                    @role('admin')
                        <a href="{{ route('notifications.edit', $notification) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('notifications.destroy', $notification) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this?')">
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
