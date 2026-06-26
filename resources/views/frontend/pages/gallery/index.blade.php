@extends('frontend.layouts.master')
@section('title', 'Gallery')
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
                                    <h2>Gallery</h2>
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
                                        <h4>Gallery</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Gallery</li>
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

    <!-- fetch gallery -->
    @php
        $gallery = \App\Models\GalleryImage::where('status', 'active')->latest()->get() ?? collect();
       @endphp
    <!-- Gallery -->
    <section class="section-gallery padding-tb-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape"
                                class="svg-img left-side">Grand Ambiance<img src="assets/img/banner/right-shape.svg"
                                alt="banner-right-shape" class="svg-img right-side"></p>
                        <h4>Our <span>Gallery</span></h4>
                    </div>
                </div>
                @forelse($gallery as $item)
                    <div class="col-lg-4 col-sm-6 col-12 rx-575-50 mb-24" data-aos="fade-up" data-aos-duration="1000">
                        <figure class="rx-gallery-card">
                            <a class="rx-gallery-img"
                                href="{{ $item->image ? asset('storage/' . $item->image) : 'assets/img/gallery/1.jpg' }}"
                                data-fancybox="gallery">
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : 'assets/img/gallery/1.jpg' }}"
                                    alt="gallery-1">
                            </a>
                        </figure>
                    </div>


                @empty

                    {{-- FALLBACK (if no data) --}}
                    @for($i = 1; $i <= 6; $i++)

                        <div class="col-lg-4 col-sm-6 col-12 rx-575-50 mb-24" data-aos="fade-up" data-aos-duration="1000">
                            <figure class="rx-gallery-card">
                                <a class="rx-gallery-img" href="{{ asset('assets/img/gallery/' . $i . '.jpg') }}"
                                    data-fancybox="gallery">
                                    <img src="{{ asset('assets/img/gallery/' . $i . '.jpg') }}" alt="gallery-1">
                                </a>
                            </figure>
                        </div>
                    @endfor

                @endforelse

            </div>
        </div>
    </section>

@endsection