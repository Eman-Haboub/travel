@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="https://source.unsplash.com/600x400/?contact,communication" class="img-fluid rounded shadow" alt="Contact Us">
        </div>
        <div class="col-md-6">
            <h1 class="display-5 fw-bold text-primary mb-4">Get in Touch ✉️📞</h1>
            <p class="lead text-muted">
                We'd love to hear from you! Whether you have a question, feedback, or just want to say hello — reach out! 🙌
            </p>
            <p class="text-muted">
                Fill out the form below or use the contact details to connect with us. We're always here to help and chat! 🤝
            </p>
            <a href="{{ route('pages.home') }}" class="btn btn-primary btn-lg mt-3">Back to Home 🏠</a>
        </div>
    </div>

    <hr class="my-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center fw-bold text-secondary mb-4">Contact Form 📝</h2>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="your@email.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Type your message here..."></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-lg w-100">Send Message 💬</button>
            </form>
        </div>
    </div>
</div>
@endsection
