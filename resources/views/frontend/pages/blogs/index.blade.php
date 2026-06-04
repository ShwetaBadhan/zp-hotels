@extends('frontend.layouts.master')
@section('title', 'Our Blogs')
@section('content')
    <section class="section-breadcrumb padding-b-50">
        <div class="rx-breadcrumb-image">
            <div class="rx-breadcrumb-overlay"></div>
            <div class="inner-breadcrumb-contact">
                <div class="main-breadcrumb-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rx-banner-contact">
                                    <h2>Our Blogs</h2>
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
                                        <h4>Our Blogs</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Our Blogs</li>
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
    <!-- Blog -->
    <section class="section-blog padding-t-50 padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">New
                            Blogs<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape"
                                class="svg-img right-side"></p>
                        <h4>Latest <span>News</span></h4>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="owl-carousel rx-blog-slider" id="rxblogslider">
                        <div class="rx-blog-card">
                            <div class="rx-blog-img">
                                <img src="assets/img/blog/1.jpg" alt="blog-1" id="myImage">
                            </div>
                            <div class="rx-blog-contact">
                                <span>June 28,2024 - Restaurant</span>
                                <h4><a href="{{ route('blog-details') }}">Best way to solve business deal issue in
                                        market.</a>
                                </h4>
                            </div>
                        </div>
                        <div class="rx-blog-card">
                            <div class="rx-blog-img">
                                <img src="assets/img/blog/2.jpg" alt="blog-2">
                            </div>
                            <div class="rx-blog-contact">
                                <span>June 30,2021 - Gym</span>
                                <h4><a href="{{ route('blog-details') }}">Marketing Guide 5 steps to Success</a></h4>
                            </div>
                        </div>
                        <div class="rx-blog-card">
                            <div class="rx-blog-img">
                                <img src="assets/img/blog/3.jpg" alt="blog-3">
                            </div>
                            <div class="rx-blog-contact">
                                <span>June 16,2021 - Spa</span>
                                <h4><a href="{{ route('blog-details') }}">Best Way to solve Business deal.</a></h4>
                            </div>
                        </div>
                        <div class="rx-blog-card">
                            <div class="rx-blog-img">
                                <img src="assets/img/blog/4.jpg" alt="blog-4">
                            </div>
                            <div class="rx-blog-contact">
                                <span>June 10,2025 - Golf</span>
                                <h4><a href="{{ route('blog-details') }}">customer service stats know in 2019.</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection