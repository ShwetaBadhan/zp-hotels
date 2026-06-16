@php
    $HomeAbout = App\Models\AboutSection::where('is_active', true)->first();
@endphp
<!-- About -->
<div class="section-about padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-about-img">
                    <img src="{{ isset($HomeAbout->image) ? asset('storage/'.$HomeAbout->image) : asset('assets/img/about/about-two.png') }}" alt="about-two" class="rx-white-img">
                </div>
            </div>
            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="rx-about-page-contact">
                    <div class="rx-banner">
                        <p>{{ $HomeAbout->sub_title ?? 'Zp grand Hotel' }}</p>
                        <h4>{{ $HomeAbout->main_title ?? 'Where Elegance Meets <span>Excellence</span>' }}</h4>
                    </div>
                    <div class="inner-about-contact">
                        <p> {{ $HomeAbout->description_1 ?? 'Nestled in the heart of Delhi, Royalx stands as a beacon of
                                elegance and sophistication. Our hotel seamlessly blends
                                timeless charm with modern amenities, offering an
                                unparalleled experience for discerning travelers.' }}</p>
                        <p>{{ $HomeAbout->description_2 ?? 'Our hotel seamlessly blends timeless charm with modern
                            amenities, offering an unparalleled experience for
                            discerning travelers.' }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>