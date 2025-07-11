@extends('layout.app')

@section('title', 'Edit Trip')

@section('content')
<div class="container py-4">
    <h2>Edit Trip: {{ $trip->name }}</h2>

    <form action="{{ route('trips.update', $trip) }}" method="POST">
        @csrf
        @method('PUT')

        @include('trips.partials.form', ['trip' => $trip])

        <button class="btn btn-primary">Update Trip</button>
    </form>
</div>
@endsection
