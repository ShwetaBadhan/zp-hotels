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

   
    @php
        $attractions = App\Models\NearbyAttraction::where('status', 'active')->latest()->get();
    @endphp

    @foreach ($attractions as $attraction)
        <section class="section-about padding-tb-50">
            <div class="container">
                <div class="row mb-minus-24 align-items-center">

                    @if($loop->odd)

                        <!-- Image Left -->
                        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                            <div class="rx-about-img">
                                <img src="{{ !empty($attraction->image) && file_exists(public_path('storage/' . $attraction->image))
                        ? asset('storage/' . $attraction->image)
                        : asset('assets/img/about/about-one.png') }}"
                                    alt="{{ $attraction->title ?? 'Nearby Attraction' }}" class="rx-white-img">
                            </div>
                        </div>

                        <!-- Content Right -->
                        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="rx-about-contact">
                                <div class="rx-banner">
                                    <p>{{ $attraction->sub_title ?: 'Nearby Attraction' }}</p>
                                    <h4>{{ $attraction->title ?: 'Explore the Attraction' }}</h4>
                                </div>

                                <div class="inner-contact">
                                    {!! $attraction->description ?: '<p>Description will be available soon.</p>' !!}
                                </div>
                            </div>
                        </div>

                    @else

                        <!-- Content Left -->
                        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="rx-about-contact">
                                <div class="rx-banner">
                                    <p>{{ $attraction->sub_title ?: 'Nearby Attraction' }}</p>
                                    <h4>{{ $attraction->title ?: 'Explore the Attraction' }}</h4>
                                </div>

                                <div class="inner-contact">
                                    {!! $attraction->description ?: '<p>Description will be available soon.</p>' !!}
                                </div>
                            </div>
                        </div>

                        <!-- Image Right -->
                        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                            <div class="rx-about-img">
                                <img src="{{ !empty($attraction->image) && file_exists(public_path('storage/' . $attraction->image))
                        ? asset('storage/' . $attraction->image)
                        : asset('assets/img/about/about-one.png') }}"
                                    alt="{{ $attraction->title ?? 'Nearby Attraction' }}" class="rx-white-img">
                            </div>
                        </div>

                    @endif

                </div>
            </div>
        </section>
    @endforeach

    {{-- Show if no attractions exist --}}
    @if($attractions->isEmpty())
        <section class="section-about padding-tb-50">
            <div class="container">
                <div class="text-center">
                    <h4>Nearby Attractions</h4>
                    <p>No nearby attractions available at the moment.</p>
                </div>
            </div>
        </section>
    @endif


@endsection