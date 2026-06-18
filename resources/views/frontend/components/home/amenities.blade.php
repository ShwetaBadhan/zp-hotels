
@php
    $facilities = App\Models\Facility::where('status', 'active')->latest()->get();
@endphp

<!-- Amenities -->
<section class="section-amenities padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p>
                        <img src="{{ asset('assets/img/banner/left-shape.svg') }}" alt=""
                            class="svg-img left-side">
                        Luxury Comforts
                        <img src="{{ asset('assets/img/banner/right-shape.svg') }}" alt=""
                            class="svg-img right-side">
                    </p>
                    <h4>Our <span>Amenities</span></h4>
                </div>
            </div>

            <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="owl-carousel rx-amenities-slider">

                    @forelse($facilities as $facility)
                        <div class="row mb-minus-24">
                            <div class="col-lg-8 col-12 mb-24">
                                <div class="rx-amenities-img">
                                    <img src="{{ asset('storage/' . $facility->image) }}"
                                        alt="{{ $facility->title }}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 mb-24">
                                <div class="rx-amenities-contact amenities-animation">
                                    <div class="inner-banner">
                                        <h4>{{ $facility->title }}</h4>
                                    </div>

                                    <p>
                                        {{ Str::limit(strip_tags($facility->description), 250) }}
                                    </p>

                                    <div class="amenities-btn">
                                        <a href="{{ route('rooms.index') }}" class="rx-btn-two">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p>No amenities available.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>