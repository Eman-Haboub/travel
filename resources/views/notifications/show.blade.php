@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Notification Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $notification->title }}</h5>
            <p class="card-text">{{ $notification->message }}</p>
            <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
