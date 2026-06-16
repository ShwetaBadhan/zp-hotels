@php
    $HomeAbout = App\Models\HomeAboutSection::where('is_active', true)->first();
@endphp
<!-- About -->
<section class="section-about padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-about-img">
                    <img src="{{ isset($HomeAbout->image) ? asset('storage/'.$HomeAbout->image) : asset('assets/img/about/about-one.png') }}" alt="about" class="rx-white-img">
                    <div class="rx-rounded-circle">
                        <a href="{{ route('about-us') }}">
                            <svg viewBox="0 0 100 100" width="100" height="100">
                                <defs>
                                    <path id="circle" d=" M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0">
                                    </path>
                                </defs>
                                <text>
                                    <textPath xlink:href="#circle">
                                        About Us - About Us - About -
                                    </textPath>
                                </text>
                            </svg>
                            <div class="inner-contact">
                                <i class="ri-arrow-right-up-line"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="rx-about-contact">
                    <div class="rx-banner">
                        <p> {{ $HomeAbout->sub_title ?? 'ZP Grand Hotel' }}</p>
                        <h4> {{ $HomeAbout->main_title ?? 'Where Elegance Meets Excellence' }}</h4>
                    </div>
                    <div class="inner-contact">
                        <p> {{ $HomeAbout->description_1 ?? 'Nestled in the heart of Delhi, Royalx stands as a beacon of
                                elegance and sophistication. Our hotel seamlessly blends
                                timeless charm with modern amenities, offering an
                                unparalleled experience for discerning travelers.' }}</p>
                        <p>{{ $HomeAbout->description_2  ?? 'Our hotel seamlessly blends timeless charm with modern
                            amenities, offering an unparalleled experience for
                            discerning travelers.' }}</p>
                        <div class="rx-about-inner-box">
                            <div class="row mb-minus-24">
                                <div class="col-sm-4 col-12 rx-575-50 mb-24">
                                    <div class="rx-about-box">
                                        <h5>554+</h5>
                                        <p>Awards</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 rx-575-50 mb-24 mt-24">
                                    <div class="rx-about-box">
                                        <h5>251K+</h5>
                                        <p>Visitors</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 rx-575-50 mb-24">
                                    <div class="rx-about-box">
                                        <h5>84K+</h5>
                                        <p>Events</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>