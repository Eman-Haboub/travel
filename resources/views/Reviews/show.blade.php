@extends('layout.app')

@section('content')
    <div class="container">
        <h1>View Review</h1>

        <div class="card">
            <div class="card-body">
                <h5>Trip: {{ $review->trip->destination }}</h5>
                <p><strong>Rating:</strong>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            ⭐
                        @else
                            ☆
                        @endif
                    @endfor
                </p>
                <p><strong>Comment:</strong> {{ $review->comment }}</p>
                <p><strong>User:</strong> {{ $review->user->name }}</p>
            </div>
        </div>
    </div>
@endsection
