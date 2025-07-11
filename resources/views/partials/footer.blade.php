<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container text-center text-md-start">
        <div class="row text-left">

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="margin-bottom: 30px;">
                <h5 class="text-uppercase fw-bold mb-4">Contact Us</h5>
                <p><i class="bi bi-geo-alt-fill me-2"></i> Amman, Jordan</p>
                <p><i class="bi bi-envelope-fill me-2"></i> support@travel.com</p>
                <p><i class="bi bi-phone-fill me-2"></i> +962 7 9000 0000</p>
                <div class="mt-3">
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-youtube fs-4"></i></a>
                </div>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="margin-bottom: 30px;">
                <h5 class="text-uppercase fw-bold mb-4">Information</h5>
                <ul class="list-unstyled">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.contact') }}">Contact</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('pages.faq') }}" >FAQs</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('pages.privacy') }}" >Privacy Policy</a></li>
                    <li><a class="text-light text-decoration-none" href="{{ route('pages.terms') }}">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" style="margin-bottom: 30px;">
                <h5 class="text-uppercase fw-bold mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                     <li class="nav-item"><a class="nav-link text-white" href="{{ route('pages.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('trips.index') }}">Trips</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('hotels.index') }}">Hotels</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('tickets.index') }}">Tickets</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4" style="margin-bottom: 30px;">
                <h5 class="text-uppercase fw-bold mb-4">About the Website</h5>
                <p>We offer the best deals on trips, hotels, and tickets in the simplest and fastest ways, with instant support and reliable service.</p>
            </div>
        </div>
    </div>

    <hr class="my-4 border-light">

    <div class="text-center text-muted">
        &copy; {{ date('Y') }} Travel Booking. All rights reserved.
    </div>
</footer>
