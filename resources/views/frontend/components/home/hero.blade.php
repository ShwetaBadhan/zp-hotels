@php
    $sliders = App\Models\HomeSlider::where('status', 'active')->latest()->get() ?? collect();
@endphp
<!-- Hero -->
<section class="section-hero margin-b-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">

                <div class="rx-slider">
                    @php
                        $generalSetting = App\Models\GeneralSetting::first();
                    @endphp
                    @forelse($sliders as $slider)
                        <div class="rx-slide slide-{{ $loop->iteration }}"
                            style="background-image: url('{{ asset("storage/" . $slider->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
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
                                                        <span><a class="text-white"
                                                                href="tel:{{ $generalSetting->phone ?? '+91 78693 89086' }}" target="_blank">{{ $generalSetting->phone  ?? '+91 78693 89086'}}</a></span>
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
                                                        <span><a class="text-white"
                                                                href="tel:{{ $generalSetting->phone ?? '+91 78693 89086' }}" target="_blank">{{ $generalSetting->phone  ?? '+91 78693 89086'}}</a></span>
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