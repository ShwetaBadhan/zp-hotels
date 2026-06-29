@extends('frontend.layouts.master')
@section('title', 'Nearby Attraction')
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
                                    <h2>Nearby Attractions</h2>
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
                                        <h4>Nearby Attractions</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Nearby Attractions</li>
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

    <!-- About -->
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-about-img">
                        <img src="assets/img/about/about-one.png" alt="about" class="rx-white-img">

                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-about-contact">
                        <div class="rx-banner">
                            <p>Sukhna Lake</p>
                            <h4>Sukhna Lake</h4>
                        </div>
                        <div class="inner-contact">
                            <p> Sukhna Lake, a beautiful man-made lake, is a perfect spot to relax and spend quality time
                                with loved ones.

                                Hotel Emerald, Chandigarh: Approx 2 km away
                                Hotel Downtown17, Chandigarh: Approx 5 km away
                                Hotel Diamond Plaza, Chandigarh: Approx 5 km away
                                Hotel Diamond Inn, Chandigarh: Approx 6 km away
                                Hotel Dreamland, Chandigarh: Approx 6 km away</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <!-- <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-about-contact">
                        <div class="rx-banner">
                            <p>Sukhna Lake</p>
                            <h4>Sukhna Lake</h4>
                        </div>
                        <div class="inner-contact">
                            <p> Sukhna Lake, a beautiful man-made lake, is a perfect spot to relax and spend quality time
                                with loved ones.

                                Hotel Emerald, Chandigarh: Approx 2 km away
                                Hotel Downtown17, Chandigarh: Approx 5 km away
                                Hotel Diamond Plaza, Chandigarh: Approx 5 km away
                                Hotel Diamond Inn, Chandigarh: Approx 6 km away
                                Hotel Dreamland, Chandigarh: Approx 6 km away</p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-about-img">
                        <img src="assets/img/about/about-one.png" alt="about" class="rx-white-img">

                    </div>
                </div>

            </div>
        </div>
    </section> -->


@endsection