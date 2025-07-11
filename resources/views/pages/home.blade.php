@extends('layout.app')

@section('content')
    <style>
        .hero {
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1170&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            height: 80vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .search-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 15px;
            margin-top: -60px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .article-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .article-category {
            font-size: 0.85rem;
            color: #888;
        }

        .highlight-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
        }

        .highlight-card img {
            border-radius: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .rating {
            color: gold;
        }
    </style>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Your journey starts here</h1>
            <p class="lead">Explore the most beautiful destinations at amazing prices</p>
        </div>
    </div>

    <!-- Search Box -->
    <div class="container my-5">
        <div class="search-box">
            <form>
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Enter destination">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected disabled>Select service type</option>
                            <option>Hotel</option>
                            <option>Trip</option>
                            <option>Ticket</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Featured Trips -->
    @if ($trips->count())
        <div class="container my-5">
            <h2 class="text-center section-title">Featured Destinations</h2>
            <div class="row g-4">
                @foreach ($trips as $trip)
                    <div class="col-md-4">
                        <div class="card destination-card">
                            <img src="{{ $trip->image ?? 'https://via.placeholder.com/400x300' }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $trip->destination }}</h5>
                                <p class="card-text">{{ $trip->description }}</p>
                                <p class="text-muted">Price: ${{ number_format($trip->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Featured Hotels -->
    @if ($hotels->count())
        <div class="container my-5">
            <h2 class="text-center section-title">Selected Hotels</h2>
            <div class="row g-4">
                @foreach ($hotels as $hotel)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="{{ $hotel->image }}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover; object-position: center;" alt="Hotel Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel->name }}</h5>
                                <p class="card-text">{{ $hotel->description }}</p>
                                <p class="text-muted">Location: {{ $hotel->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Customer Reviews -->
    @if ($reviews->count())
        <div class="bg-light py-5">
            <div class="container">
                <h2 class="text-center section-title">Customer Reviews</h2>
                <div class="row g-4 text-center">
                    @foreach ($reviews as $review)
                        <div class="col-md-4">
                            <div class="border p-3 rounded bg-white shadow-sm">
                                <p>"{{ Str::limit($review->comment, 100) }}"</p>
                                <strong>{{ $review->user->name ?? 'User' }}</strong><br>
                                <small class="text-muted">Rating: {{ $review->rating }}/5</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
{{-- 
   <!-- Latest Stories Section -->
    <div class="container py-5">
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Latest Stories</h4>
                <a href="#" class="btn btn-outline-dark btn-sm">See all stories</a>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="https://i.pinimg.com/1200x/9f/f7/9c/9ff79c3c61aaa51ce3565214bf4456f1.jpg" class="img-fluid rounded w-100 mb-3" alt="Main Story">
                    <p class="article-category mt-2">Food & Drink</p>
                    <h5 class="fw-semibold">Los Angeles food & drink guide: 10 things to try in LA</h5>
                    <p class="text-muted small">From burgers to cocktails, here’s your go-to guide for food adventures in LA.</p>
                </div>
                <div class="col-md-6">
                    <div class="story-thumb d-flex align-items-start mb-3">
                        <img src="https://i.pinimg.com/736x/b5/d6/49/b5d64981442221a6d1bb9e2b950972bf.jpg" class="rounded me-3" alt="Story Thumbnail">
                        <div>
                            <p class="article-category">Travel</p>
                            <p class="article-title">10 South London Markets You'll Love</p>
                            <p class="text-muted small mb-0">6 July 2025 • 5 min read</p>
                        </div>
                    </div>
                    <div class="story-thumb d-flex align-items-start mb-3">
                        <img src="https://i.pinimg.com/736x/b5/d6/49/b5d64981442221a6d1bb9e2b950972bf.jpg" class="rounded me-3" alt="Story Thumbnail">
                        <div>
                            <p class="article-category">Hotels</p>
                            <p class="article-title">10 Hotels Around the World You Can Book With Points</p>
                            <p class="text-muted small mb-0">4 July 2025 • 4 min read</p>
                        </div>
                    </div>
                    <div class="story-thumb d-flex align-items-start">
                        <img src="https://i.pinimg.com/736x/b5/d6/49/b5d64981442221a6d1bb9e2b950972bf.jpg" class="rounded me-3" alt="Story Thumbnail">
                        <div>
                            <p class="article-category">Budget Travel</p>
                            <p class="article-title">Visiting Chicago on a Budget: Eats & Attractions</p>
                            <p class="text-muted small mb-0">2 July 2025 • 3 min read</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


@endsection
