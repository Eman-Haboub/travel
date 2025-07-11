@extends('layout.app')

@section('title', 'FAQs')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">
        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    What is TRAVEL EVA and how does it work?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    TRAVEL EVA is a travel booking platform where you can explore, book trips, hotels, tickets, and manage your travel plans in one place.
                </div>
            </div>
        </div>

        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    How do I book a hotel or a trip?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Simply navigate to the "Trips" or "Hotels" section, select your desired destination or hotel, and follow the booking steps.
                </div>
            </div>
        </div>

        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    Can I cancel or modify my bookings?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, you can view and manage your bookings from your profile. Cancellation and modification options depend on the trip or hotel policy.
                </div>
            </div>
        </div>

        <div class="accordion-item mb-3 shadow-sm">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                    How can I contact support?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can reach out to our support team through the "Contact" page or by sending us an email at support@traveleva.com.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
