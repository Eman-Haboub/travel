@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2>👤 User Details</h2>
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone Number:</strong> {{ $user->phone }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
