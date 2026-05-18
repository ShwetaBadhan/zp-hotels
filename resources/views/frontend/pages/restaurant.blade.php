@extends('frontend.layouts.master')
@section('title','Restaurant')
@section('content')

<!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="rx-breadcrumb-image">
            <div class="rx-breadcrumb-overlay"></div>
            <div class="inner-breadcrumb-contact">
                <div class="main-breadcrumb-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rx-banner-contact">
                                    <h2>Restaurant</h2>
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
                                        <h4>Restaurant</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Restaurant</li>
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

    <!-- Menu -->
    <section class="section-menu padding-t-100 padding-b-50">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Our Menu<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>
                        <h4>Delicious <span>Dishes</span></h4>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-menu-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" id="starters-tab" data-bs-toggle="tab"
                                    data-bs-target="#starters" role="tab" aria-controls="starters" aria-selected="true">Starters</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" id="breakfast-tab" data-bs-toggle="tab"
                                    data-bs-target="#breakfast" role="tab" aria-controls="breakfast" aria-selected="false">Breakfast</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" id="lunch-tab" data-bs-toggle="tab"
                                    data-bs-target="#lunch" role="tab" aria-controls="lunch" aria-selected="false">Lunch</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" id="dinner-tab" data-bs-toggle="tab"
                                    data-bs-target="#dinner" role="tab" aria-controls="dinner" aria-selected="false">Dinner</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content rx-menutab">
                        <div class="tab-pane fade show active" id="starters" role="tabpanel" aria-labelledby="starters-tab">
                            <div class="row mb-minus-24 rx-relative">
                                <div class="col-lg-6 col-12 mb-24">
                                    <div class="rx-menu-tabs-contact">
                                        <div class="inner-menu active-menu">
                                            <div class="sub-contact">
                                                <h5>Vegetable spring rolls</h5>
                                                <p>A crispy and famous vegetarian starter filled with a mix.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$60</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Mozzarella Sticks</h5>
                                                <p>Fried mozzarella cheese served with marinara sauce.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$30</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Spinach and Artichoke Dip</h5>
                                                <p>A creamy dip made with tortilla chips or bread.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$45</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Nachos</h5>
                                                <p>Tortilla chips topped with sometimes ground beef.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$40</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Stuffed Mushrooms</h5>
                                                <p>Mushrooms filled with often baked until golden.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
                            <div class="row mb-minus-24 rx-relative">
                                <div class="col-lg-6 col-12 mb-24">
                                    <div class="rx-menu-tabs-contact">
                                        <div class="inner-menu active-menu">
                                            <div class="sub-contact">
                                                <h5>Breakfast Burrito</h5>
                                                <p>A large tortilla filled with scrambled cheese or potatoes.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$10</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Hash Browns</h5>
                                                <p>Crisp romaine, parmesan, and Caesar dressing</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$20</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>French Toast</h5>
                                                <p>Bread soaked in an egg mixture, then fried and served.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$45</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Waffles Bread</h5>
                                                <p>Crisp and golden waffles, typically served with butter, syrup.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$35</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Cinnamon Rolls</h5>
                                                <p>Sweet rolls made with cinnamon and sugar, often topped.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
                            <div class="row mb-minus-24 rx-relative">
                                <div class="col-lg-6 col-12 mb-24">
                                    <div class="rx-menu-tabs-contact">
                                        <div class="inner-menu active-menu">
                                            <div class="sub-contact">
                                                <h5>Avocado Sandwich</h5>
                                                <p>Sliced turkey, avocado, lettuce, and tomato, often served.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Shrimp Scampi</h5>
                                                <p>Shrimp sautéed in garlic, butter, and white wine, often served.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$25</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Stuffed Peppers</h5>
                                                <p>Bell peppers filled with rice, vegetables, and sometimes.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$45</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Zucchini Noodles (Zoodles)</h5>
                                                <p>Spiralized zucchini served like pasta, often with a light sauce.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$40</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Portobello Mushroom Burger</h5>
                                                <p>A large grilled portobello mushroom cap served as a burger.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
                            <div class="row mb-minus-24 rx-relative">
                                <div class="col-lg-6 col-12 mb-24">
                                    <div class="rx-menu-tabs-contact">
                                        <div class="inner-menu active-menu">
                                            <div class="sub-contact">
                                                <h5>Risotto alla Milanese</h5>
                                                <p>A creamy rice dish made with saffron, giving it a distinctive.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Lasagna al Forno</h5>
                                                <p>Layers of pasta, Bolognese sauce, béchamel, and cheese, baked.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$25</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Yorkshire Pudding</h5>
                                                <p>A traditional Sunday roast with roasted beef, served.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$45</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Beef Stroganoff</h5>
                                                <p>Sautéed beef strips served in a creamy mushroom sauce.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$40</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inner-menu">
                                            <div class="sub-contact">
                                                <h5>Steak Frites</h5>
                                                <p>Grilled steak served with French fries, often with a side.</p>
                                            </div>
                                            <div class="sub-prices">
                                                <h4>$15</h4>
                                            </div>
                                            <div class="rx-side-menu-image">
                                                <div class="row mb-minus-24">
                                                    <div class="col-lg-6 col-12 mb-24">
                                                        <div class="inner-img radius-one">
                                                            <img src="assets/img/menu/1.jpg" alt="menu-1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-two">
                                                            <img src="assets/img/menu/2.jpg" alt="menu-2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-three">
                                                            <img src="assets/img/menu/3.jpg" alt="menu-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12 mb-24 d-none-991">
                                                        <div class="inner-img radius-four">
                                                            <img src="assets/img/menu/4.jpg" alt="menu-4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- Testimonials -->
    <section class="section-testimonials padding-t-50 padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Testimonials<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>                        
                        <h4>Echoes of <span>Brilliance</span></h4>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="owl-carousel rx-testimonials-slider">
                        <div class="row mb-minus-24">
                            <div class="col-md-4 col-12 mb-24">
                                <div class="rx-testimonials-img">
                                    <img src="assets/img/testimonials/1.jpg" alt="testimonials-1">
                                </div>
                            </div>
                            <div class="col-md-8 col-12 mb-24">
                                <div class="rx-testimonials-contact">
                                    <div class="rx-inner-banner">
                                        <h4>Isabella Bianchi</h4>
                                        <span>(Manager)</span>
                                    </div>
                                    <div class="inner-contact">
                                        <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                            at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                            amet alias aut quaerat maiores blanditiis."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-minus-24">
                            <div class="col-md-4 col-12 mb-24">
                                <div class="rx-testimonials-img">
                                    <img src="assets/img/testimonials/2.jpg" alt="testimonials-2">
                                </div>
                            </div>
                            <div class="col-md-8 col-12 mb-24">
                                <div class="rx-testimonials-contact">
                                    <div class="rx-inner-banner">
                                        <h4>Saddika Alard</h4>
                                        <span>(Team Leader)</span>
                                    </div>
                                    <div class="inner-contact">
                                        <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                            at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                            amet alias aut quaerat maiores blanditiis."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-minus-24">
                            <div class="col-md-4 col-12 mb-24">
                                <div class="rx-testimonials-img">
                                    <img src="assets/img/testimonials/3.jpg" alt="testimonials-3">
                                </div>
                            </div>
                            <div class="col-md-8 col-12 mb-24">
                                <div class="rx-testimonials-contact">
                                    <div class="rx-inner-banner">
                                        <h4>Stephen Smith</h4>
                                        <span>(Co Founder)</span>
                                    </div>
                                    <div class="inner-contact">
                                        <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                            at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                            amet alias aut quaerat maiores blanditiis."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Book -->
    <section class="section-book padding-tb-100 bg-two-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Book Now<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>
                        <h4>Book Your <span>Private Table</span></h4>
                    </div>
                </div>
                <form class="rx-book-from" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="row mb-minus-24">
                        <div class="col-lg-3 col-sm-6 col-12 mb-24">
                            <div class="rx-input-box">
                                <label for="fname">Name*</label>
                                <input type="text" id="fname" class="rx-from-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-24">
                            <div class="rx-input-box">
                                <label for="Phone">Phone No*</label>
                                <input type="text" id="Phone" class="rx-from-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-24">
                            <div class="rx-input-box">
                                <label for="gust">No. Of Gust*</label>
                                <input type="text" id="gust" class="rx-from-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-24">
                            <div class="rx-input-box">
                                <label for="datepicker">Date & Time*</label>
                                <input type="text" id="datepicker" class="rx-from-control datepicker">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="rx-booking-last-contact">
                        <p>No refunds will be given once you booked</p>
                        <div class="booking-button">
                            <a href="javascript:void(0)" class="rx-btn-two">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection