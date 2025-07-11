<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1e2a38;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('home') }}">
            <i class="bi bi-airplane-engines me-1"></i> TRAVEL EVA
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white"href="{{ route('notifications.index') }}">🔔</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('trips.index') }}">Trips</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('hotels.index') }}">Hotels</a></li>
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('hotel_booking.index') }}">hotel_booking</a></li> --}}
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('bookings.index') }}">Bookings</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('tickets.index') }}">Tickets</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('reviews.index') }}">Reviews</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('payments.index') }}">Payments</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('users.index') }}">Users</a></li> --}}
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.contact') }}">Contact</a>
                </li>
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white"
                                href="{{ route('users.index') }}">Users</a>
                    @endif
                @endauth

            </ul>

            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                <a href="{{ route('register') }}" class="btn btn-info text-dark">Sign Up</a>
            </div>
        </div>
    </div>
</nav>

{{-- @auth
    @if (Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">لوحة التحكم</a>
    @endif
@endauth --}}
