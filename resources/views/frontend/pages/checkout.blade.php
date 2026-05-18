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
                                    <h2>Checkout</h2>
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
                                        <h4>Checkout</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Checkout</li>
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

    <!-- Checkout -->
    <section class="section-checkout padding-t-50 padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-4 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-room-details-sidebar">
                        <div class="sub-title">
                            <h4>Reservation</h4>
                        </div>
                        <div class="inner-room-details">
                            <form>
                                <div class="rx-room-details-from">
                                    <label class="checkinone">Check In</label>
                                    <input type="text" id="checkinone" class="rx-from-control datepicker">
                                </div>
                                <div class="rx-room-details-from">
                                    <label class="checkoutone">Check Out</label>
                                    <input type="text" id="checkoutone" class="rx-from-control datepicker">
                                </div>
                                <div class="rx-room-details-from">
                                    <label for="room">Room</label>
                                    <select class="rx-from-control form-select" aria-label="Select Method" id="room">
                                        <option selected>Select</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="rx-room-details-from">
                                    <div class="row mb-minus-24">
                                        <div class="col-sm-6 col-12 mb-24">
                                            <label for="adultsone">Adult</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="adultsone">
                                                <option selected>Select</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-12 mb-24">
                                            <label for="childrenone">Children</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="childrenone">
                                                <option selected>Select</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="rx-side-from ex-service">
                                    <h4>Extra Services</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault" id="flexcheckboxDefault1">
                                        <label class="form-check-label" for="flexcheckboxDefault1">
                                            Air Conditioner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault" id="flexcheckboxDefault2">
                                        <label class="form-check-label" for="flexcheckboxDefault2">
                                            Free Internet
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault" id="flexcheckboxDefault3">
                                        <label class="form-check-label" for="flexcheckboxDefault3">
                                            LCD Television
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault" id="flexcheckboxDefault4">
                                        <label class="form-check-label" for="flexcheckboxDefault4">
                                            Microwave
                                        </label>
                                    </div>
                                </div>
                                <div class="rx-side-from">
                                    <h4>Your Price</h4>
                                    <span>$210 / per room</span>
                                </div>
                                <div class="rx-side-from">
                                    <div class="rx-side-from-buttons">
                                        <button type="button" class="rx-btn-two result-placeholder">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 mb-24">
                    <div class="rx-checkout">
                        <div class="rx-checkout-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="inner-title">
                                <h4>New Customer</h4>
                            </div>
                            <div class="rx-check-block">
                                <h5 class="rx-check-subtitle">Checkout Options</h5>
                                <div class="rx-new-option">
                                    <div>
                                        <input type="radio" id="account1" name="radio-group" checked>
                                        <label for="account1">Register Account</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="account2" name="radio-group">
                                        <label for="account2">Guest Account</label>
                                    </div>
                                </div>
                                <p class="rx-new-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi veritatis amet sequi obcaecati nihil perspiciatis delectus necessitatibus at velit mollitia!</p>
                                <div class="rx-new-btn">
                                    <a href="javascript:void(0)" class="rx-btn-two">Continue</a>
                                </div>
                            </div>
                        </div>
                        <div class="rx-checkout-wrap" data-aos="fade-up" data-aos-duration="1000">
                            <div class="inner-title">
                                <h4>Returning Customer</h4>
                            </div>
                            <div class="rx-check-login-form">
                                <form action="#" method="post">
                                    <div class="rx-check-login-wrap">
                                        <label for="name">Email Address</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div class="rx-check-login-wrap">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" required>
                                    </div>
                                    <div class="rx-check-login-button">
                                        <button class="rx-btn-two" type="submit">Login</button>
                                        <a class="rx-check-login-fp" href="javascript:void(0)">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="rx-checkout-wrap" data-aos="fade-up" data-aos-duration="1000">
                            <div class="inner-title">
                                <h4>Billing Details</h4>
                            </div>
                            <div class="rx-billing-details">
                                <h5 class="rx-check-subtitle">Checkout Options</h5>
                                <div class="rx-new-option">
                                    <div class="option-radio">
                                        <input type="radio" id="account-one-1" name="radio-group-one">
                                        <label for="account-one-1">I want to use an existing address </label>
                                    </div>
                                    <div class="option-radio">
                                        <input type="radio" id="account-two-2" name="radio-group-one" checked>
                                        <label for="account-two-2">I want to use new address</label>
                                    </div>
                                </div>
                                <div class="row mb-minus-24">
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="fname">First Name*</label>
                                            <input type="text" name="firstname" id="fname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="lname">Last Name*</label>
                                            <input type="text" name="lasttname" id="lname" required>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="address">Address*</label>
                                            <input type="text" name="address" id="address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="city">City*</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="city">
                                                <option selected>City</option>
                                                <option value="1">City 1</option>
                                                <option value="2">City 2</option>
                                                <option value="3">City 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="postalcode">Post Code*</label>
                                            <input type="text" id="postalcode" name="postalcode">
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="country">Country*</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="country">
                                                <option selected>Country</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 mb-24">
                                        <div class="rx-input-box">
                                            <label for="regionstate">Region State*</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="regionstate">
                                                <option selected>Region/State</option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                            </select>
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

@endsection