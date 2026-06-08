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
                                    <form action="{{ route('contact-us.store') }}" id="contactForm" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="firstname">Your Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="firstname" name="name" value="{{ old('name') }}"
                                                        placeholder="Enter Your Name" class="rx-form-control" required>
                                                    <small id="name-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="email">Your Email<span class="text-danger">*</span></label>
                                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                        placeholder="Enter Your email" class="rx-form-control" required>
                                                    <small id="email-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="phone">Your Phone<span class="text-danger">*</span></label>
                                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                                        placeholder="Enter your phone" class="rx-form-control" required>
                                                    <small id="phone-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="enuiry_for">Enquiry Type<span
                                                            class="text-danger">*</span></label>
                                                    <select name="enuiry_for" class="form-control" required>
                                                        <option value="">Select Enquiry Type</option>
                                                        <option>Room Booking</option>
                                                        <option>Event/Conference</option>
                                                        <option>Restaurant Reservation</option>
                                                        <option>General Inquiry</option>
                                                        <option>Feedback</option>
                                                    </select>
                                                    <small id="enuiry_for-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="checkinDate">
                                                        Check In Date <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="check_in" id="checkinDate"
                                                        class="rx-form-control" required>
                                                    <small id="check_in-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="checkoutDate">
                                                        Check Out Date <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="check_out" id="checkoutDate"
                                                        class="rx-form-control" required>
                                                    <small id="check_out-error" class="text-danger error-message"></small>

                                                </div>
                                            </div>
                                            <div class="col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="message">Message</label>
                                                    <textarea class="rx-form-control" name="message"
                                                        placeholder="Enter Your Message" id="message"></textarea>
                                                    <small id="message-error" class="text-danger error-message"></small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="rx-inner-button">
                                                    <button type="submit" id="submitBtn" class="rx-btn-two">Send
                                                        Message</button>
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
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- date picker  -->
    <script>
        flatpickr("#checkinDate", {
            dateFormat: "Y-m-d",
            minDate: "today",
            allowInput: true,
            placeholder: "Select Check In Date"
        });

        flatpickr("#checkoutDate", {
            dateFormat: "Y-m-d",
            minDate: "today",
            allowInput: true,
            placeholder: "Select Check Out Date"
        });

        // Set placeholders
        document.getElementById('checkinDate').setAttribute('placeholder', 'Select Check In Date');
        document.getElementById('checkoutDate').setAttribute('placeholder', 'Select Check Out Date');
    </script>
    <!-- form submission -->
    <script>
        jQuery(document).ready(function ($) {
            $('#contactForm').on('submit', function (e) {
                e.preventDefault();

                $('.error-message').text('');

                grecaptcha.ready(function () {

                    grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', { action: 'contact' }).then(function (token) {

                        let form = $('#contactForm');

                        let formData = form.serialize() + "&g-recaptcha-response=" + token;

                        $('#submitBtn').prop('disabled', true);

                        $.ajax({
                            url: form.attr('action'),
                            method: 'POST',
                            data: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },

                            success: function (response) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message,
                                    confirmButtonColor: '#28a745'
                                });

                                form[0].reset();
                            },

                            error: function (xhr) {

                                if (xhr.status === 422) {

                                    let errors = xhr.responseJSON.errors;

                                    $.each(errors, function (key, value) {
                                        $('#' + key + '-error').text(value[0]);
                                    });

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Validation Error',
                                        text: 'Please check form fields.'
                                    });
                                }
                            },

                            complete: function () {
                                $('#submitBtn').prop('disabled', false);
                            }
                        });

                    });

                });

            });
        });
    </script>
@endpush