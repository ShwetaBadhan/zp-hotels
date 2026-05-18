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
                                    <h2>Faq</h2>
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
                                        <h4>Faq</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Faq</li>
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

    <!-- Faq -->
    <section class="section-faq padding-t-50 padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">FAQ<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape" class="svg-img right-side"></p>
                        <h4>Frequently Asked <span>Questions</span></h4>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-faq">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What Facilities Does Your Hotel Have?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How Do I Book A Room For My Vacation?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        How We are best among others?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Is There Any Fitness Center In Your Hotel?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        What Type Of Room Service Do You Offer?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingsix">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        What Type Of Room Service Do You Offer?
                                    </button>
                                </h2>
                                <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="rx-faq">
                        <div class="accordion" id="accordionExampletwo">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseOne">
                                        What Facilities Does Your Hotel Have?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                                        How Do I Book A Room For My Vacation?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapseThree">
                                        How We are best among others?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse show" aria-labelledby="heading3" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseFour">
                                        Is There Any Fitness Center In Your Hotel?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapseFive">
                                        What Type Of Room Service Do You Offer?
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading6">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapsesix">
                                        What Type Of Room Service Do You Offer?
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExampletwo">
                                    <div class="accordion-body">
                                        <p>
                                            This is the dolor sit amet, consectetur adipisicing elit.
                                            Ad voluptate doloribus eos sunt labore ea enim voluptatem,
                                            sequi voluptas rem doloremque architecto. Libero, vero
                                            natus.
                                        </p>
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