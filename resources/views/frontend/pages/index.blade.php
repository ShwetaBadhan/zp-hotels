@extends('frontend.layouts.master')
@section('title', 'Welcome to ZP Grand Hotel')
@section('content')

    @include('frontend.components.home.hero')
    @include('frontend.components.home.about')
    @include('frontend.components.home.facilities')
    
    @include('frontend.components.home.rooms')
    @include('frontend.components.home.services')
    @include('frontend.components.home.faq')
    @include('frontend.components.home.socials')

    @include('frontend.components.home.testimonials')
    @include('frontend.components.home.float-call')


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