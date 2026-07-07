@extends('frontend.layouts.master')
@section('title', 'Welcome to ZP Grand Hotel')
@section('content')

    @include('frontend.components.home.hero')
    @include('frontend.components.home.about')
    
    @include('frontend.components.home.rooms')
    @include('frontend.components.home.services')
    @include('frontend.components.home.faq')
    <section class="zp-social-wall ">
        <div class="container">
            <div class="rx-banner text-center rx-banner-effects">
                <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="16" viewBox="0 0 80 16"
                        src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">
                        <path class="cls-1" d="M9,9V7H67V9H9Z"></path>
                        <path class="cls-2" d="M71.713,1.787L77.9,7.972l-6.185,6.185L65.528,7.972Z"></path>
                        <circle class="cls-3" cx="6" cy="8" r="4"></circle>
                    </svg>Follow Our Journey<svg xmlns="http://www.w3.org/2000/svg" width="80" height="16"
                        viewBox="0 0 80 16" src="assets/img/banner/right-shape.svg" alt="banner-right-shape"
                        class="svg-img right-side">
                        <path class="cls-1" d="M70.906,9V7h-58V9h58Z"></path>
                        <path class="cls-2" d="M8.194,1.787L2.009,7.972l6.185,6.185,6.185-6.185Z"></path>
                        <circle class="cls-3" cx="73.906" cy="8" r="4"></circle>
                    </svg></p>
                <h4 class="text-white">Connect With ZP Grand Hotel</h4>
            </div>


            <div class="zp-social-grid">


                <div class="zp-social-card">
                    <div class="zp-social-title">
                        <i class="ri-facebook-circle-fill"></i>
                        <h4>Facebook</h4>
                    </div>

                    <div class="zp-social-frame">


                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/Marriott&tabs=timeline&width=500&height=550&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
                            width="100%" height="550" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true">
                        </iframe>

                    </div>
                </div>



                <div class="zp-social-card">

                    <div class="zp-social-title">
                        <i class="ri-instagram-line"></i>
                        <h4>Instagram</h4>
                    </div>

                    <div class="zp-social-frame">

                        <div class="zp-social-profile">
                            <i class="ri-instagram-fill"></i>

                            <h5>@marriott</h5>

                            <p>Follow us for luxury stays, travel inspiration and exclusive offers.</p>

                            <a href="https://www.instagram.com/marriott/" target="_blank" class="zp-social-btn">
                                View Instagram
                            </a>
                        </div>

                        <script src="https://static.elfsight.com/platform/platform.js" async></script>

                        <div class="elfsight-app-YOUR_WIDGET_ID"></div>

                    </div>

                </div>



                <div class="zp-social-card">

                    <div class="zp-social-title">
                        <i class="ri-linkedin-box-fill"></i>
                        <h4>LinkedIn</h4>
                    </div>

                    <div class="zp-social-frame">
                        <div class="zp-social-profile">

                            <i class="ri-linkedin-box-fill"></i>

                            <h5>Marriott International</h5>

                            <p>
                                Follow our latest hospitality news and company updates.
                            </p>

                            <a href="https://www.linkedin.com/company/marriott-international/" target="_blank"
                                class="zp-social-btn">

                                View LinkedIn

                            </a>

                        </div>
                        <iframe src="https://www.linkedin.com/embed/feed/update/YOUR_POST_ID" height="550" width="100%"
                            frameborder="0" allowfullscreen="">
                        </iframe>

                    </div>

                </div>

            </div>

        </div>
    </section>
    @include('frontend.components.home.testimonials')



@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                Swal.fire({
                    icon: 'success',
                    title: 'Booking Successful!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#c19b76',
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false
                });

            });
        </script>
    @endif
    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?86687';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#2ACA45;",
                "ctaText": "",
                "borderRadius": "25",
                "marginLeft": "20",
                "marginBottom": "30",
                "marginRight": "50",
                "position": "left"
            },
            "brandSetting": {
                "brandName": "ZP Grand Hotel",
                "brandSubTitle": "Typically replies within a day",
                "brandImg": "../assets/img/logo/favicon.png",
                "welcomeText": "Hi there!\nHow can I help you?",
                "messageText": "Hello, I have a question about ",
                "backgroundColor": "#2ACA45;",
                "ctaText": "Start Chat",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "+917539910692"
            }
        };
        s.onload = function () {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
@endpush