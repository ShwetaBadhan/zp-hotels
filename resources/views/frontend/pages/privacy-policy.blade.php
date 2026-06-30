@extends('frontend.layouts.master')
@section('title', 'Privacy Policy')
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
                                    <h2>Privacy Policy</h2>
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
                                        <h4>Privacy Policy</h4>
                                    </div>
                                    <div class="last-contact">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>Privacy Policy</li>
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
        $privacyPolicy = App\Models\PrivacyPolicy::where('is_active', true)->first();
    @endphp

    <!-- Privacy Policy Section Start -->
    <section class="ht-terms-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-banner text-center rx-banner-effects">
                        <p>
                            <img src="{{ asset('assets/img/banner/left-shape.svg') }}" alt="" class="svg-img left-side">
                            {{ $privacyPolicy->sub_title ?? 'Hotel Policies' }}
                            <img src="{{ asset('assets/img/banner/right-shape.svg') }}" alt="" class="svg-img right-side">
                        </p>
                        <h4> <span>{{ $privacyPolicy->main_title ?? 'Privacy Policy' }}</span></h4>
                    </div>
                </div>
            </div>



            <div class="ht-terms-wrapper">

                <div class="ht-terms-card">

                    {{ $privacyPolicy->description_1 ?? '<h4>1. Introduction</h4>
                    <p>
                        At <strong>ZP Grand Hotel</strong>, we respect your privacy and are committed to protecting the
                        personal information you share with us. This Privacy Policy explains how we collect, use,
                        disclose, and safeguard your information when you visit our website or use our services.
                    </p>

                    <h4>2. Information We Collect</h4>
                    <ul>
                        <li>Name, email address, phone number, and postal address.</li>
                        <li>Booking and reservation details.</li>
                        <li>Government-issued identification details (where required by law).</li>
                        <li>Payment information processed through secure payment gateways.</li>
                        <li>Website usage information such as IP address, browser type, and cookies.</li>
                    </ul>

                    <h4>3. How We Use Your Information</h4>
                    <ul>
                        <li>To process and manage hotel reservations.</li>
                        <li>To communicate booking confirmations and customer support.</li>
                        <li>To improve our services and website experience.</li>
                        <li>To comply with legal and regulatory requirements.</li>
                        <li>To send promotional offers, only where permitted by applicable law.</li>
                    </ul>

                    <h4>4. Cookies & Tracking Technologies</h4>
                    <p>
                        Our website may use cookies and similar technologies to enhance your browsing experience,
                        analyze website traffic, and improve website performance. You can control cookie settings
                        through your browser preferences.
                    </p>

                    <h4>5. Sharing of Information</h4>
                    <p>
                        We do not sell or rent your personal information. Your information may be shared only with:
                    </p>
                    <ul>
                        <li>Trusted service providers who assist in hotel operations.</li>
                        <li>Secure payment gateway providers for transaction processing.</li>
                        <li>Government authorities when required by applicable laws.</li>
                    </ul>

                    <h4>6. Data Security</h4>
                    <p>
                        We implement appropriate technical and organizational measures to protect your personal
                        information against unauthorized access, loss, misuse, or disclosure. However, no method of
                        internet transmission or electronic storage is completely secure.
                    </p>

                    <h4>7. Data Retention</h4>
                    <p>
                        We retain your personal information only for as long as necessary to fulfill the purposes
                        outlined in this Privacy Policy or as required by applicable laws and regulations.
                    </p>

                    <h4>8. Your Rights</h4>
                    <ul>
                        <li>Request access to your personal information.</li>
                        <li>Request correction of inaccurate or incomplete information.</li>
                        <li>Request deletion of your information where legally permissible.</li>
                        <li>Withdraw consent for marketing communications at any time.</li>
                    </ul>

                    <h4>9. Third-Party Links</h4>
                    <p>
                        Our website may contain links to third-party websites. We are not responsible for the privacy
                        practices or content of those external websites. We encourage you to review their privacy
                        policies before providing any personal information.
                    </p>

                    <h4>10. Changes to This Privacy Policy</h4>
                    <p>
                        We may update this Privacy Policy from time to time. Any changes will be posted on this page
                        along with the updated effective date. Continued use of our website indicates your acceptance
                        of the revised policy.
                    </p>

                    <h4>11. Contact Us</h4>

                    <div class="ht-contact-info">
                        <p><strong>Hotel:</strong> ZP Grand Hotel</p>
                        <p><strong>Address:</strong> Your Hotel Address</p>
                        <p><strong>Phone:</strong> +91 XXXXX XXXXX</p>
                        <p><strong>Email:</strong> info@hotel.com</p>
                    </div>
' }}
                </div>

            </div>

        </div>
    </section>
@endsection