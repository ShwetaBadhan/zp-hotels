@extends('frontend.layouts.master')
@section('title', 'Room Details')
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
                                    <h2>{{ $category->name ?? 'Room Details' }}</h2>
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
                                        <h4>{{ $category->name ?? 'Room Details' }}</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>{{ $category->name ?? 'Room Details' }}</li>
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
        $images = is_array($category->images)
            ? $category->images
            : json_decode($category->images, true);

        $amenities = is_array($category->amenities)
            ? $category->amenities
            : json_decode($category->amenities, true);
    @endphp


    <section class="hbk-room-details-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Left Content -->
                <div class="col-lg-8">

                    <!-- Thumbnail -->
                    <div class="hbk-room-main-thumb">

                        @if($category->thumbnail)
                            <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}">
                        @elseif(!empty($images) && count($images))
                            <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $category->name }}">
                        @else
                            <img src="{{ asset('frontend/assets/images/no-image.jpg') }}" alt="No Image">
                        @endif

                    </div>
                    @php
                        $roomServices = App\Models\RoomFacility::where('status', 'active')->latest()->get();
                    @endphp

                    <div class="hbk-room-content-box">

                        <div class="box-facility">
                            @forelse($roomServices as $item)
                                <div class="amenity-card">
                                    <div class="amenity-icon">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <h6>{{ $item->title }}</h6>
                                </div>
                            @empty
                                <p>No amenities available.</p>
                            @endforelse
                        </div>

                    </div>
                    <!-- Content -->
                    <div class="hbk-room-content-box">

                        <span class="hbk-room-tag">
                            ZP Grand Hotel
                        </span>

                        <h2 class="hbk-room-title">
                            {{ $category->name ?? 'Luxury Room' }}

                        </h2>

                        <p class="hbk-room-desc">
                            {{ $category->description ?? 'Experience a luxurious stay with world-class amenities and exceptional hospitality.' }}

                        </p>

                    </div>

                    <!-- Gallery -->
                    <div class="hbk-gallery-wrapper">

                        <div class="swiper hbkGallerySlider">

                            <div class="swiper-wrapper">

                                @if(!empty($images))

                                    @foreach($images as $image)

                                        <div class="swiper-slide">

                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $category->name }}">

                                        </div>

                                    @endforeach

                                @endif

                            </div>

                            <div class="swiper-pagination"></div>

                        </div>

                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">

                    <div class="hbk-room-sidebar">


                        <!-- CTA -->
                        <div class="hbk-sidebar-box">

                            <span class="hbk-sidebar-badge">
                                Luxury Stay
                            </span>

                            <h3>
                                Book Your Dream Escape
                            </h3>

                            <p>
                                Relax in elegance with premium comfort, world-class hospitality,
                                and unforgettable experiences.
                            </p>



                        </div>

                        <!-- Amenities -->

                        <div class="hbk-sidebar-box">
                            <h4>Amenities</h4>

                            <ul class="hbk-list">
                                @forelse($amenities as $amenity)
                                    <li>✔ {{ $amenity }}</li>
                                @empty
                                    <li>No amenities available.</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Services -->


                        <div class="hbk-sidebar-box">
                            <form action="{{ route('booking-form') }}" method="GET">

                                <input type="hidden" name="category" value="{{ $category->id }}">

                                <div class="mb-3">
                                    <label>Check In</label>
                                    <input type="date" id="check_in" name="check_in" value="{{ request('check_in') }}"
                                        class="form-control" min="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Check Out</label>
                                    <input type="date" id="check_out" name="check_out" value="{{ request('check_out') }}"
                                        class="form-control" min="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Adults</label>
                                    <select name="adults" class="form-select" required>
                                        @for($i = 1; $i <= $category->max_guests; $i++)
                                            <option value="{{ $i }}" {{ request('adults', 1) == $i ? 'selected' : '' }}>
                                                {{ $i }} Adult{{ $i > 1 ? 's' : '' }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Children</label>
                                    <select name="children" class="form-select">
                                        @for($i = 0; $i <= $category->max_guests; $i++)
                                            <option value="{{ $i }}" {{ request('children', 0) == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'Child' : 'Children' }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <button class="bk-search-btn w-100">
                                    Book Now <i class="ri-arrow-right-line"></i>
                                </button>

                            </form>
                        </div>



                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper(".hbkGallerySlider", {

            slidesPerView: 1,

            spaceBetween: 20,

            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {

                576: {
                    slidesPerView: 2
                },

                992: {
                    slidesPerView: 2
                },

                1200: {
                    slidesPerView: 3
                }

            }

        });

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
    </script>
@endpush