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
    <section class="bk-search-section py-5">
        <div class="container">
            <div class="bk-search-wrapper">

                <div class="bk-search-heading text-center mb-4">
                    <span class="bk-search-subtitle">Find Your Perfect Stay</span>
                    <h4 class="bk-search-title">Check Room Availability</h4>
                    <p class="bk-search-desc">
                        Select your stay dates and guests to discover the best rooms available for your trip.
                    </p>
                </div>

                <form action="{{ route('booking.search') }}" method="POST">
                    @csrf

                    <div class="row g-4 align-items-end">

                        <div class="col-lg-3 col-md-6">
                            <label class="bk-search-label">Check In</label>
                            <input type="date" id="check_in" name="check_in"
                                value="{{ old('check_in', $search['check_in'] ?? '') }}"
                                class="form-control bk-search-input">
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <label class="bk-search-label">Check Out</label>
                            <input type="date" id="check_out" name="check_out"
                                value="{{ old('check_out', $search['check_out'] ?? '') }}"
                                class="form-control bk-search-input">
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label class="bk-search-label">Adults</label>
                            <select name="adults" class="form-select bk-search-input">
                                <option value="{{ old('adults', $search['adults'] ?? 'Select Adults') }}">
                                    {{ old('adults', $search['adults'] ?? 'Select Adults') }}
                                </option>
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                                <option value="4">4 Adults</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label class="bk-search-label">Children</label>
                            <select name="children" value="{{ old('children', $search['children'] ?? '') }}"
                                class="form-select bk-search-input">
                                <option value="0">0 Child</option>
                                <option value="1">1 Child</option>
                                <option value="2">2 Children</option>
                                <option value="3">3 Children</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <button type="submit" class="bk-search-btn w-100">
                                Check
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>
    @if(isset($availableCategories) && count($availableCategories))

        <section class="htl-listing-section py-5">
            <div class="container">

                @foreach($availableCategories as $category)

                    <div class="htl-card mb-4">

                        <div class="htl-image">
                            <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}">

                            @if($category->offer_price)
                                @php
                                    $discount = round((($category->price - $category->offer_price) / $category->price) * 100);
                                @endphp
                                <span class="htl-badge">{{ $discount }}% OFF</span>
                            @endif
                        </div>

                        <div class="htl-content">

                            <div class="htl-top">

                                <div class="htl-info">

                                    <h4>{{ $category->name }}</h4>

                                    <div class="htl-meta">
                                        <span><i class="ri-user-line"></i> {{ $category->max_guests }} Guests</span>
                                        <span><i class="ri-hotel-bed-line "></i> {{ $category->bedrooms }} Bedroom</span>
                                        <span><i class="ri-water-flash-line"></i> {{ $category->bathrooms }} Bathroom</span>

                                        @if($category->size_sqft)
                                            <span><i class="ri-ruler-2-line"></i> {{ $category->size_sqft }} sq.ft.</span>
                                        @endif
                                    </div>

                                    @if($category->amenities)
                                        <div class="htl-features">
                                            @foreach(array_slice($category->amenities, 0, 4) as $amenity)
                                                <span>✓ {{ $amenity }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>

                                <div class="htl-price-box">

                                    @if($category->offer_price)

                                        <span class="htl-old-price">
                                            ₹{{ number_format($category->price) }}
                                        </span>

                                        <h3>₹{{ number_format($category->offer_price) }}</h3>

                                    @else

                                        <h3>₹{{ number_format($category->price) }}</h3>

                                    @endif

                                    <small>Per Night</small>

                                    <p>
                                        Total Guests :
                                        {{ $category->max_guests }}
                                    </p>

                                    <a href="#" class="htl-btn openBookingModal" data-category="{{ $category->id }}"
                                        data-room="{{ $category->name }}"
                                        data-price="{{ $category->offer_price ?? $category->price }}"
                                        data-checkin="{{ $search['check_in'] }}" data-checkout="{{ $search['check_out'] }}"
                                        data-adults="{{ $search['adults'] }}" data-children="{{ $search['children'] }}">
                                        Book Now
                                    </a>

                                </div>

                            </div>

                            <div class="htl-bottom">

                                <div class="htl-highlights">

                                    <span><i class="ri-home-smile-line"></i> Premium Stay</span>



                                    <span><i class="ri-calendar-line"></i> Available</span>

                                </div>

                                <a href="{{ route('room-details', $category->slug) }}" class="htl-details">
                                    View Room Details →
                                </a>

                            </div>

                        </div>

                    </div>
                    <!-- Booking Modal -->
                    <!-- Hotel Booking Modal -->
                    <div class="modal fade hbk-modal" id="bookingModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content hbk-modal-content">

                                <div class="hbk-modal-header">

                                    <div>
                                        <span class="hbk-modal-tag">Luxury Stay</span>
                                        <h4>Complete Your Reservation</h4>
                                        <p>Fill in your details to confirm your booking.</p>
                                    </div>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                </div>

                                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                                    @csrf

                                    <div class="modal-body">

                                        <!-- Booking Summary -->
                                        <div class="hbk-summary-card">

                                            <div class="row align-items-center">

                                                <div class="col-lg-7">

                                                    <div class="hbk-room-info">

                                                        <img id="modalRoomImage"
                                                            src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=500"
                                                            alt="">

                                                        <div>

                                                            <h4 id="roomName">Super Deluxe Room</h4>

                                                            <span class="hbk-price">
                                                                <span id="roomPrice">2529</span> / Night
                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-5">

                                                    <div class="row g-3">

                                                        <div class="col-6">
                                                            <div class="hbk-info-box">
                                                                <small>Check In</small>
                                                                <strong id="modalCheckIn"></strong>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="hbk-info-box">
                                                                <small>Check Out</small>
                                                                <strong id="modalCheckOut"></strong>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="hbk-info-box">
                                                                <small>Guests</small>
                                                                <strong id="modalGuests"></strong>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- Hidden Fields -->

                                        <input type="hidden" name="category_id" id="category_id">
                                        <input type="hidden" name="check_in" id="check_in_hidden">
                                        <input type="hidden" name="check_out" id="check_out_hidden">
                                        <input type="hidden" name="adults" id="adults_hidden">
                                        <input type="hidden" name="children" id="children_hidden">

                                        <div class="row mt-4">

                                            <div class="col-12 mb-4">
                                                <h5 class="hbk-section-title">
                                                    Guest Information
                                                </h5>
                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label>Full Name</label>

                                                <input type="text" name="name" class="form-control hbk-input"
                                                    placeholder="Enter full name">

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label>Email Address</label>

                                                <input type="email" name="email" class="form-control hbk-input"
                                                    placeholder="Enter email">

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label>Phone Number</label>

                                                <input type="text" name="phone" class="form-control hbk-input"
                                                    placeholder="Enter phone number">

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label>City</label>

                                                <input type="text" name="city" class="form-control hbk-input"
                                                    placeholder="Enter city">

                                            </div>

                                            <div class="col-12">

                                                <label>Special Request</label>

                                                <textarea class="form-control hbk-input hbk-textarea" name="special_request"
                                                    placeholder="Write any special request..."></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="hbk-modal-footer">

                                        <button type="button" class="btn hbk-cancel-btn" data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn hbk-book-btn" id="bookingBtn">
                                            Confirm Booking
                                        </button>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </section>

    @elseif(isset($availableCategories))

        <div class="container py-5">
            <div class="alert alert-warning text-center">
                <h5>No rooms available for the selected dates.</h5>
            </div>
        </div>

    @endif


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