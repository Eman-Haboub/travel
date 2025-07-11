@extends('layout.app') {{-- Make sure you have a layout named app --}}

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="https://images.unsplash.com/photo-1576737064520-f45d313d17ff?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded shadow" alt="About Us">
        </div>
        <div class="col-md-6">
            <h1 class="display-5 fw-bold text-primary mb-4">Who Are We? 🤔💡</h1>
            <p class="lead text-muted">
                We're a passionate team of tech lovers and innovators! 🎯
                We build smart solutions, stunning websites, and unforgettable digital experiences!
            </p>
            <p class="text-muted">
                Our mission is to turn ideas into living digital realities.
                We love details and believe that beauty lies in simplicity and smart design! ✨
            </p>
<a href="{{ route('pages.home') }}" class="btn btn-primary btn-lg mt-3">Back to Home 🏠</a>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="fw-bold text-secondary">Why Choose Us? 🤩</h2>
        <p class="text-muted mb-4">Check out the awesome features that make us your top choice!</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-lightbulb display-4 text-warning mb-3"></i>
                        <h5 class="card-title">Creative Ideas</h5>
                        <p class="card-text">We come up with fresh ideas that make your project stand out!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-code-slash display-4 text-success mb-3"></i>
                        <h5 class="card-title">Clean & Modern Code</h5>
                        <p class="card-text">We write organized, scalable code using the latest web tech! 🧠</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-heart-fill display-4 text-danger mb-3"></i>
                        <h5 class="card-title">Passion & Love</h5>
                        <p class="card-text">We love what we do and always aim for the best results! ❤️</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
