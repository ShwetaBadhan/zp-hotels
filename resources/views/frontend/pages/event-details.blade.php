@extends('frontend.layouts.master')
@section('title', 'Event Detail')
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
                                    <h2>Meetings and Events</h2>
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
                                       <h2>{{ $event->title }}</h2>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Event Details</li>
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
    <!-- Blog-details -->
    <section class="section-blog-details padding-t-50 padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-8 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-blog-details">
                        <div class="rx-blog-details-cart">
                            <div class="blog-details-img">
                                <img src="{{ !empty($event->image) ? asset('storage/' . $event->image) : asset('assets/img/blog-details/1.jpg') }}"
                                    alt="{{ $event->title }}">
                            </div>
                            <div class="blog-details-contact">
    <span>
        {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
        - {{ $event->sub_title }}
    </span>

    <h4>{{ $event->title }}</h4>

    {!! $event->description !!}
</div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-blog-details-sidebar">
                        <div class="search-box">
                            <div class="search-inner-box">
                                <i class="ri-search-line"></i>
                                <input type="text" placeholder="Search...">
                            </div>
                        </div>
                        <div class="rx-details-categories">
                            <h5 class="sub-title">Categories</h5>
                            <div class="inner-contact">
                                <ul>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">News</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Offer</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Spa & Wellness</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Events</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Food & Drinks</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      
                        <div class="rx-popular-tags">
                            <h5 class="sub-title">Popular Tags</h5>
                            <div class="popular-inner-tags">
                                <ul>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Entertainment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Gym</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Booking</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Hotel</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Entertainment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Guests</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Booking</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Entertainment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('meetings-events-detail', $event->id) }}">Hotel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection