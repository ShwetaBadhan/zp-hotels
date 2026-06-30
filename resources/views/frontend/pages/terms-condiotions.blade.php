@extends('frontend.layouts.master')
@section('title', 'Terms Conditions')
@section('content')

    <!-- Breadcrumb -->
    <section class="section-breadcrumb padding-b-50">
        <div class="rx-breadcrumb-image">
            <div class="rx-breadcrumb-overlay"></div>
            <div class="inner-breadcrumb-contact">
                <div class="main-breadcrumb-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rx-banner-contact">
                                    <h2>Terms & Conditions</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rx-banner-breadcrumb">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-contact">
                                    <div class="main-heading">
                                        <h4>Terms & Conditions</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Terms & Conditions</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @php
        $terms = App\Models\TermsConditions::where('is_active', true)->first();
    @endphp
    <!-- Privacy Policy Section Start -->
    <section class="ht-terms-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p>
                            <img src="{{ asset('assets/img/banner/left-shape.svg') }}" alt="" class="svg-img left-side">
                            {{ $terms->sub_title ?? 'Hotel Policies' }}
                            <img src="{{ asset('assets/img/banner/right-shape.svg') }}" alt="" class="svg-img right-side">
                        </p>
                        <h4> <span>{{ $terms->main_title ?? 'Terms & Conditions' }}</span></h4>
                    </div>
                </div>
            </div>



            <div class="ht-terms-wrapper">

                <div class="ht-terms-card">
                    {{ $terms->description_1 ?? '<h4>1. Acceptance of Terms</h4>
                    <p>
                        By accessing our website or making a reservation, you agree to comply with these Terms & Conditions
                        and all applicable laws.
                    </p>

                    <h4>2. Reservations</h4>
                    <ul>
                        <li>Bookings are subject to room availability.</li>
                        <li>Guests must provide accurate booking information.</li>
                        <li>The hotel reserves the right to refuse fraudulent reservations.</li>
                    </ul>

                    <h4>3. Check-In & Check-Out</h4>
                    <ul>
                        <li>Valid government-issued ID is mandatory.</li>
                        <li>Early check-in and late check-out depend on availability.</li>
                        <li>Additional charges may apply for extended stays.</li>
                    </ul>

                    <h4>4. Payment Policy</h4>
                    <p>
                        Payment may be required during booking. Any additional charges incurred during your stay must be
                        cleared before check-out.
                    </p>

                    <h4>5. Cancellation Policy</h4>
                    <ul>
                        <li>Cancellation policies depend on your selected booking plan.</li>
                        <li>No-show bookings may be charged according to hotel policy.</li>
                    </ul>

                    <h4>6. Guest Responsibilities</h4>
                    <ul>
                        <li>Maintain the room in good condition.</li>
                        <li>Damage to hotel property may incur additional charges.</li>
                        <li>Illegal or disruptive behaviour is strictly prohibited.</li>
                    </ul>

                    <h4>7. Hotel Rules</h4>
                    <ul>
                        <li>Smoking is allowed only in designated areas.</li>
                        <li>Pets are permitted only where specifically allowed.</li>
                        <li>The hotel reserves the right to deny accommodation for policy violations.</li>
                    </ul>

                    <h4>8. Limitation of Liability</h4>
                    <p>
                        The hotel shall not be liable for loss, damage, theft, delays, or events beyond its reasonable
                        control.
                    </p>

                    <h4>9. Privacy</h4>
                    <p>
                        All personal information is handled in accordance with our Privacy Policy.
                    </p>

                    <h4>10. Contact Us</h4>

                    <div class="ht-contact-info">
                        <p><strong>Hotel:</strong> ZP Grand Hotel</p>
                        <p><strong>Address:</strong> Your Hotel Address</p>
                        <p><strong>Phone:</strong> +91 XXXXX XXXXX</p>
                        <p><strong>Email:</strong> info@hotel.com</p>
                    </div>' }}
                </div>

            </div>

        </div>
    </section>
    <!-- Privacy Policy Section End -->
@endsection