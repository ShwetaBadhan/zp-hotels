@extends('frontend.layouts.master')
@section('title','Room Details')
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
                                    <h2>Room Details</h2>
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
                                        <h4>Room Details</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Room Details</li>
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

    <!-- Room-details -->
    <section class="section-room-details padding-t-50 padding-b-100">
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
                                    <label class="checkin">Check In</label>
                                    <input type="text" id="checkin1" class="rx-from-control datepicker">
                                </div>
                                <div class="rx-room-details-from">
                                    <label class="checkout">Check Out</label>
                                    <input type="text" id="checkout1" class="rx-from-control datepicker">
                                </div>
                                <div class="rx-room-details-from">
                                    <label for="room1">Room</label>
                                    <select class="rx-from-control form-select" aria-label="Select Method" id="room1">
                                        <option selected>Select</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="rx-room-details-from">
                                    <div class="row mb-minus-24">
                                        <div class="col-lg-6 col-12 mb-24">
                                            <label for="adults">Adult</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="adults1">
                                                <option selected>Select</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-24">
                                            <label for="children">Children</label>
                                            <select class="rx-from-control form-select" aria-label="Select Method" id="children1">
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
                                        <a class="rx-btn-two result-placeholder" href="{{ route('checkout') }}">
                                            Check Now
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 mb-24">
                    <div class="rx-room-details-main-contact">
                        <div class="rx-main-room" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="slider room-slider-for">
                                <div class="rx-room-details-image">
                                    <img src="assets/img/room-details/1.jpg" alt="room-1">
                                </div>
                                <div class="rx-room-details-image">
                                    <img src="assets/img/room-details/2.jpg" alt="room-2">
                                </div>
                                <div class="rx-room-details-image">
                                    <img src="assets/img/room-details/3.jpg" alt="room-3">
                                </div>
                                <div class="rx-room-details-image">
                                    <img src="assets/img/room-details/4.jpg" alt="room-4">
                                </div>
                                <div class="rx-room-details-image">
                                    <img src="assets/img/room-details/5.jpg" alt="room-5">
                                </div>
                            </div>
                            <div class="slider room-slider-nav">
                                <div class="rx-room-details-inner">
                                    <img src="assets/img/room-details/1.jpg" alt="room-1">
                                </div>
                                <div class="rx-room-details-inner">
                                    <img src="assets/img/room-details/2.jpg" alt="room-2">
                                </div>
                                <div class="rx-room-details-inner">
                                    <img src="assets/img/room-details/3.jpg" alt="room-3">
                                </div>
                                <div class="rx-room-details-inner">
                                    <img src="assets/img/room-details/4.jpg" alt="room-4">
                                </div>
                                <div class="rx-room-details-inner">
                                    <img src="assets/img/room-details/5.jpg" alt="room-5">
                                </div>
                            </div>
                        </div>
                        <div class="rx-inner-details" data-aos="fade-up" data-aos-duration="1000">
                            <div class="rx-title">
                                <h4>Royalx Room</h4>
                            </div>
                            <div class="inner-text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque 
                                    fuga accusamus, quam itaque error eum similique impedit eveniet debitis. 
                                    Odio aut fuga repellendus inventore? Repellat veritatis obcaecati voluptas 
                                    alias, eum velit, porro totam, minima ullam sed dicta. Iusto, quasi 
                                    consectetur?</p>
                            </div>
                            <div class="rx-details-inner">
                                <div class="inner-room-details">
                                    <div class="sub-title">
                                        <h4>Amenities</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 rx-cols-room">
                                            <ul>
                                                <li>42 Inch flat screen TV</li>
                                                <li>In-room Safe</li>
                                                <li>Mini-refrigerator</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 rx-cols-room">
                                            <ul>
                                                <li>Mini-refrigerator</li>
                                                <li>Breakfast</li>
                                                <li>complimeatary bottled water</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-room-details">
                                    <div class="sub-title">
                                        <h4>Rules & Regulation</h4>
                                    </div>
                                    <div class="rx-cols-room">
                                        <ul>
                                            <li>No smoking in side the room</li>
                                            <li>Check-in: After 02:00pm</li>
                                            <li>Late checkout: Additional change 50% of the room rate.</li>
                                            <li>Checkout: Before 11:00am</li>
                                            <li>No Pets</li>
                                            <li>Identification document is must for hotel registration.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="inner-room-details">
                                    <div class="sub-title">
                                        <h4>Add A Review</h4>
                                    </div>
                                    <div class="rx-inner-review">
                                        <form action="#">
                                            <div class="rx-input-box">
                                                <label for="firstname">Your Name*</label>
                                                <input type="text" id="firstname" class="rx-form-control" required>
                                            </div>
                                            <div class="rx-input-box">
                                                <label for="email">Your Email*</label>
                                                <input type="email" id="email" class="rx-form-control" required>
                                            </div>
                                            <div class="rx-input-box">
                                                <label for="message">Message*</label>
                                                <textarea class="rx-form-control" rows="4" id="message"></textarea>
                                            </div>
                                            <div class="rx-inner-button">
                                                <button type="button" class="rx-btn-two">Send Message</button>
                                            </div>
                                        </form>
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