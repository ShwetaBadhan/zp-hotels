@extends('frontend.layouts.master')
@section('title', 'Contact Us')
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
                                    <h2>Contact</h2>
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
                                        <h4>Contact</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Contact</li>
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

    <!-- Contact -->
    <section class="section-contact padding-t-50 padding-b-100">
        <div class="container">
            <h2 class="d-none">Contact</h2>
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-contact-form">
                        <div class="row mb-minus-24">
                            <div class="col-lg-6 col-12 mb-24">
                                <div class="rx-contact-touch-ifrem">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29749.225774882685!2d72.84343101893258!3d21.245595574425934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f4fb5c0b087%3A0xb7aabd8a90da0679!2sMota%20Varachha%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1690017805909!5m2!1sen!2sin"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 mb-24">
                                <div class="rx-inner-form">
                                    <form action="#">
                                       
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="firstname">Your Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="firstname" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="email">Your Email<span class="text-danger">*</span></label>
                                                    <input type="email" id="email" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="phone">Your Phone<span class="text-danger">*</span></label>
                                                    <input type="tel" id="phone" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="enquiry_type">Enquiry Type<span
                                                            class="text-danger">*</span></label>
                                                    <select name="enquiry_type" class="form-control">
                                                        <option value="">Select Enquiry Type</option>
                                                        <option>Room Booking</option>
                                                        <option>Event/Conference</option>
                                                        <option>Restaurant Reservation</option>
                                                        <option>General Inquiry</option>
                                                        <option>Feedback</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="checkin">Check In date<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" id="checkin" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="checkout">Check Out date<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" id="checkout" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="message">Message<span class="text-danger">*</span></label>
                                                    <textarea class="rx-form-control" id="message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="rx-inner-button">
                                                    <button type="button" class="rx-btn-two">Send Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection