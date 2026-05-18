@extends('frontend.layouts.master')
@section('title','Checkout')
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
                                    <h2>SignIn</h2>
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
                                        <h4>SignIn</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>SignIn</li>
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

    <!-- SignIn -->
    <section class="section-login padding-t-50 padding-b-100">
        <div class="container">
            <h2 class="d-none">Register</h2>
            <div class="row">
                <div class="col-12">
                    <div class="rx-login-form">
                        <div class="row mb-minus-24">
                            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                                <div class="rx-login-img">
                                    <img src="assets/img/about/about-two.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <div class="rx-inner-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="rx-banner text-center rx-banner-effects">
                                                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Login<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>
                                                    <h4>Sign <span>In</span></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="email">Your Email*</label>
                                                    <input type="email" id="email" class="rx-form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12 mb-24">
                                                <div class="rx-input-box">
                                                    <label for="password-field">Password*</label>
                                                    <input type="password" id="password-field" class="rx-form-control" required>
                                                    <i toggle="#password-field" class="toggle-password ri-eye-line"></i>
                                                </div>
                                            </div>
                                            <div class="rx-inline-block direct">
                                                <a href="javascript:void(0)" class="direct-to">Forgot Password?</a>
                                                <a href="{{ route('login') }}" class="direct-to">Sign Up?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="rx-inner-button">
                                                    <a href="{{ route('home') }}" class="back-to"><i class="ri-arrow-left-s-line"></i>Back to Home</a>
                                                    <button type="button" class="rx-btn-two">Sign In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection