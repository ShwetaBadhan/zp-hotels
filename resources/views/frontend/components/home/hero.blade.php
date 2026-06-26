@php
    $sliders = App\Models\HomeSlider::where('status', 'active')->latest()->get() ?? collect();
@endphp
<!-- Hero -->
<section class="section-hero margin-b-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">

                <div class="rx-slider">
                    @forelse($sliders as $slider)
                        <div class="rx-slide slide-{{ $loop->iteration }}">
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                                class="banner-arrow-img">

                            <div class="rx-hero-contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="inner-contact slider-animation">

                                                <p>{{ $slider->sub_title }}</p>

                                                <h2>{!! $slider->title !!}</h2>

                                                <div class="booking-now">
                                                    <div class="ico">
                                                        <i class="ri-phone-line"></i>
                                                    </div>

                                                    <div class="booking-text">
                                                        <p>Book Now</p>
                                                        <span>987 654 3210</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="rx-slide slide-1">
                            <img src="assets/img/hero/box-hero-1.png" alt="hero-box" class="banner-arrow-img">
                            <div class="rx-hero-contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="inner-contact slider-animation">
                                                <p>Luxury Hotel & Restaurant</p>
                                                <h2>Enjoy Your <span>Dream</span> Time With <span>Luxury</span>
                                                    Experience</h2>
                                                <div class="booking-now">
                                                    <div class="ico">
                                                        <i class="ri-phone-line"></i>
                                                    </div>
                                                    <div class="booking-text">
                                                        <p>Book Now</p>
                                                        <span>987 654 3210</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rx-slide slide-2">
                            <img src="assets/img/hero/box-hero-2.png" alt="hero-box" class="banner-arrow-img">
                            <div class="rx-hero-contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="inner-contact slider-animation">
                                                <p>Luxury Hotel & Restaurant</p>
                                                <h2>Enjoy Your <span>Dream</span> Time With <span>Luxury</span>
                                                    Experience</h2>
                                                <div class="booking-now">
                                                    <div class="ico">
                                                        <i class="ri-phone-line"></i>
                                                    </div>
                                                    <div class="booking-text">
                                                        <p>Book Now</p>
                                                        <span>987 654 3210</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rx-slide slide-3">
                            <img src="assets/img/hero/box-hero-3.png" alt="hero-box" class="banner-arrow-img">
                            <div class="rx-hero-contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="inner-contact slider-animation">
                                                <p>Luxury Hotel & Restaurant</p>
                                                <h2>Enjoy Your <span>Dream</span> Time With <span>Luxury</span>
                                                    Experience</h2>
                                                <div class="booking-now">
                                                    <div class="ico">
                                                        <i class="ri-phone-line"></i>
                                                    </div>
                                                    <div class="booking-text">
                                                        <p>Book Now</p>
                                                        <span>987 654 3210</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</section>
