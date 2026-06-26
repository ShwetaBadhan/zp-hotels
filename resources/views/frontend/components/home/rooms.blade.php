@php
    $categories = App\Models\RoomCategory::latest()->get();
@endphp
<!-- Rooms -->
<section class="section-room padding-t-50 padding-b-100">
    <div class="container">

        <div class="row mb-minus-24">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape"
                            class="svg-img left-side">Luxury Suites<img src="assets/img/banner/right-shape.svg"
                            alt="banner-right-shape" class="svg-img right-side"></p>
                    <h4>Our Best <span>Rooms</span></h4>
                </div>
            </div>
            @forelse($categories as $category)
                <div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up">

                    <div class="rx-rooms-main-box">

                        <div class="rooms-box-front">
                            <img src="{{ $category->thumbnail ? asset('storage/' . $category->thumbnail) : asset('frontend/assets/img/rooms/default-room.jpg') }}"
                                alt="{{ $category->name ?? 'Room' }}">

                            <div class="content-wrap">
                                <div class="inner-contact">
                                    <h4>{{ $category->name ?? 'Room Name' }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="rooms-box-back">

                            <img src="{{ $category->thumbnail ? asset('storage/' . $category->thumbnail) : asset('frontend/assets/img/rooms/default-room.jpg') }}"
                                alt="{{ $category->name ?? 'Room' }}">

                            <div class="content-wrap">

                                <div class="box-overlay"></div>

                                <div class="inner-back-side">

                                    <div class="rx-price">
                                        <span>
                                            ₹{{ $category->price ? number_format($category->price) : '0' }}/Night
                                        </span>
                                    </div>

                                    <div class="sub-inner-contact">

                                        <h5>{{ $category->name ?? 'Room Name' }}</h5>

                                        <ul>
                                            @forelse($category->amenities ?? [] as $amenity)
                                                <li>{{ $amenity }}</li>
                                            @empty
                                                <li>No amenities available.</li>
                                            @endforelse
                                        </ul>

                                    </div>

                                    <div class="last-contact">

                                        <a href="{{ $category->slug ? route('room-details', $category->slug) : '#' }}"
                                            class="inner-button">
                                            Book Now
                                        </a>

                                        <a href="{{ $category->slug ? route('room-details', $category->slug) : '#' }}"
                                            class="inner-button">
                                            <i class="ri-arrow-right-up-line"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            @empty
                <div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-rooms-main-box">
                        <div class="rooms-box-front">
                            <img src="assets/img/rooms/1.jpg" alt="room-1">
                            <div class="content-wrap">
                                <div class="inner-contact">
                                    <h4>Junior Suite</h4>
                                </div>
                            </div>
                        </div>
                        <div class="rooms-box-back">
                            <img src="assets/img/rooms/1.jpg" alt="rooms-1">
                            <div class="content-wrap">
                                <div class="box-overlay"></div>
                                <div class="inner-back-side">
                                    <div class="rx-price">
                                        <span>250$ / N</span>
                                    </div>
                                    <div class="sub-inner-contact">
                                        <h5>Junior Suite</h5>
                                        <ul>
                                            <li>Daily cleaning</li>
                                            <li>Room Service</li>
                                            <li>Housekeeping</li>
                                            <li>Wi-Fi & Parking</li>
                                        </ul>
                                    </div>
                                    <div class="last-contact">
                                        <a href="javascript:void(0)" class="inner-button" data-bs-toggle="modal"
                                            data-bs-target="#rx_booking_from">Book Now</a>
                                        <a href="#" class="inner-button"><i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>