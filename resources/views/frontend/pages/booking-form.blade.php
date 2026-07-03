@extends('frontend.layouts.master')
@section('title', 'Book Your Room Now !!')
@section('content')

    <!-- Breadcrumb -->
    <section class="section-breadcrumb ">
        <div class="rx-breadcrumb-image">
            <div class="rx-breadcrumb-overlay"></div>
            <div class="inner-breadcrumb-contact">
                <div class="main-breadcrumb-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rx-banner-contact">
                                    <h2>Booking</h2>
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
                                        <h4>Booking</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Booking</li>
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
    <!-- Booking Search Section Start -->

    <!-- Booking Section -->

    <section class="hbk-booking-section py-5">

        <div class="container">

            <form action="{{ route('booking-form.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- Left Side -->

                    <div class="col-lg-8">

                        <div class="zp_guest_card">

                            <div class="zp_guest_heading">

                                <span class="zp_guest_badge">
                                    Guest Details
                                </span>

                                <h3>Complete Your Reservation</h3>

                                <p>
                                    Fill in your information below to confirm your booking.
                                </p>

                            </div>

                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="hidden" name="check_in" value="{{ $search['check_in'] }}">
                            <input type="hidden" name="check_out" value="{{ $search['check_out'] }}">
                            <input type="hidden" name="adults" value="{{ $search['adults'] }}">
                            <input type="hidden" name="children" value="{{ $search['children'] }}">

                            <div class="row g-4">

                                <div class="col-md-6">

                                    <div class="zp_input_group">

                                        <label>Full Name</label>

                                        <div class="zp_input_wrap">

                                            <i class="ri-user-3-line"></i>

                                            <input type="text" name="name" class="zp_input" placeholder="John Doe">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="zp_input_group">

                                        <label>Email Address</label>

                                        <div class="zp_input_wrap">

                                            <i class="ri-mail-line"></i>

                                            <input type="email" name="email" class="zp_input" placeholder="john@email.com">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="zp_input_group">

                                        <label>Phone Number</label>

                                        <div class="zp_input_wrap">

                                            <i class="ri-phone-line"></i>

                                            <input type="text" name="phone" class="zp_input" placeholder="+91 9876543210">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="zp_input_group">

                                        <label>City</label>

                                        <div class="zp_input_wrap">

                                            <i class="ri-map-pin-line"></i>

                                            <input type="text" name="city" class="zp_input" placeholder="Your City">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="zp_input_group">

                                        <label>Special Request</label>

                                        <div class="zp_textarea_wrap">

                                            <i class="ri-chat-1-line"></i>

                                            <textarea rows="6" name="special_request" class="zp_textarea"
                                                placeholder="Tell us if you have any special requests..."></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Right Side -->

                    <div class="col-lg-4">

                        <div class="zp-booking-summary">





                            <div class="zp-summary-details">

                                <div class="zp-item">

                                    <span>Check In</span>

                                    <strong>

                                        {{ $search['check_in'] ?? 'Not Selected' }}

                                    </strong>

                                </div>

                                <div class="zp-item">

                                    <span>Check Out</span>

                                    <strong>

                                        {{ $search['check_out'] ?? 'Not Selected' }}

                                    </strong>

                                </div>

                                <div class="zp-item">

                                    <span>Guests</span>

                                    <strong>

                                        {{ $search['adults'] }}

                                        Adult(s),

                                        {{ $search['children'] }}

                                        Child

                                    </strong>

                                </div>

                                <div class="zp-item">

                                    <span>Nights</span>

                                    <strong>

                                        {{ $days }}

                                    </strong>

                                </div>

                                <div class="zp-item">

                                    <span>Total</span>

                                    <strong class="zp-total">

                                        ₹{{ number_format($total) }}

                                    </strong>

                                </div>

                            </div>

                            <button class="zp-confirm-btn">

                                Confirm Booking

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>



@endsection
@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Booking Submitted!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#c19b76',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: '{{ session("error") }}',
                    confirmButtonColor: '#dc3545'
                });
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonColor: '#f39c12'
                });
            });
        </script>
    @endif
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const checkIn = document.getElementById('check_in');
            const checkOut = document.getElementById('check_out');

            // Today's date
            const today = new Date().toISOString().split('T')[0];

            // Prevent selecting past dates
            checkIn.setAttribute('min', today);
            checkOut.setAttribute('min', today);

            // Update checkout minimum when check-in changes
            checkIn.addEventListener('change', function () {
                checkOut.value = '';
                checkOut.setAttribute('min', this.value);
            });

        });


        $(document).on('click', '.openBookingModal', function (e) {

            e.preventDefault();

            $('#category_id').val($(this).data('category'));

            $('#check_in_hidden').val($(this).data('checkin'));
            $('#check_out_hidden').val($(this).data('checkout'));

            $('#adults_hidden').val($(this).data('adults'));
            $('#children_hidden').val($(this).data('children'));

            $('#roomName').text($(this).data('room'));

            $('#roomPrice').text('₹' + $(this).data('price'));

            $('#modalCheckIn').text($(this).data('checkin'));

            $('#modalCheckOut').text($(this).data('checkout'));

            $('#modalGuests').text(
                $(this).data('adults') +
                ' Adult(s), ' +
                $(this).data('children') +
                ' Child(ren)'
            );

            $('#bookingModal').modal('show');

        });
    </script>
    <script>
        $('#bookingForm').submit(function (e) {

            e.preventDefault();

            let form = $(this);
            let btn = $('#bookingBtn');

            btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-2"></span>Processing...');

            $.ajax({

                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),

                success: function (response) {

                    btn.prop('disabled', false).html('Confirm Booking');

                    $('#bookingModal').modal('hide');

                    form[0].reset();

                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You!',
                        text: response.message,
                        confirmButtonColor: '#c19b76'
                    });

                },

                error: function (xhr) {

                    btn.prop('disabled', false).html('Confirm Booking');

                    if (xhr.status === 422) {

                        let errors = xhr.responseJSON.errors;

                        if (errors) {

                            let message = '';

                            $.each(errors, function (key, value) {
                                message += value[0] + '<br>';
                            });

                            Swal.fire({
                                icon: 'warning',
                                title: 'Validation Error',
                                html: message
                            });

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: xhr.responseJSON.message
                            });

                        }

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.message ?? 'Something went wrong.'
                        });

                    }

                }

            });

        });
    </script>
@endpush