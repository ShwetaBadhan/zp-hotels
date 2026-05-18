@extends('frontend.layouts.master')
@section('title','FAQs')
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
                                    <h2>Spa</h2>
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
                                        <h4>Spa</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Spa</li>
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

    <!-- Spa -->
    <section class="section-spa padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Spa<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>
                        <h4>What We're <span>Offering</span></h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-spa-card">
                        <div class="spa-img">
                            <img src="assets/img/spa/1.jpg" alt="spa-1">
                        </div>
                        <div class="spa-contact">
                            <span>Daily 9.00 am to 11.00 pm</span>
                            <h4>Full-body mud mask</h4>
                            <p>Lorem ipsum dolor amet adipisicing elit. Nihil in animi harum voluptatem, impedit reprehenderit!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-spa-card">
                        <div class="spa-img">
                            <img src="assets/img/spa/2.jpg" alt="spa-2">
                        </div>
                        <div class="spa-contact">
                            <span>Daily 12.00 am to 1.00 pm</span>
                            <h4>Paraffin Body Wrap</h4>
                            <p>Lorem ipsum dolor amet adipisicing elit. Nihil in animi harum voluptatem, impedit reprehenderit!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="rx-spa-card">
                        <div class="spa-img">
                            <img src="assets/img/spa/3.jpg" alt="spa-3">
                        </div>
                        <div class="spa-contact">
                            <span> Daily 2.00 am to 5.00 pm</span>
                            <h4>Body tanning /Bronzing</h4>
                            <p>Lorem ipsum dolor amet adipisicing elit. Nihil in animi harum voluptatem, impedit reprehenderit!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-24 spa-d-none" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="rx-spa-card">
                        <div class="spa-img">
                            <img src="assets/img/spa/4.jpg" alt="spa-4">
                        </div>
                        <div class="spa-contact">
                            <span> Daily 4.00 am to 6.00 pm</span>
                            <h4>Full-body mud mask</h4>
                            <p>Lorem ipsum dolor amet adipisicing elit. Nihil in animi harum voluptatem, impedit reprehenderit!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection