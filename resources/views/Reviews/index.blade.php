@extends('layout.app')

@section('content')
    <div class="container">
        <h1>All Reviews</h1>

        @include('partials.alerts')

        @role('admin')
            <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Add Review</a>
        @endrole

        <div class="row">
            @foreach ($reviews as $review)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->trip->destination ?? 'Not Specified' }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $review->user->name ?? 'Anonymous' }}</h6>
                            <p class="card-text">
                                Rating:
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        ⭐
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </p>
                            <p class="card-text">{{ $review->comment }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('reviews.show', $review) }}" class="btn btn-info btn-sm">View</a>
                            @role('admin')
                                <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection