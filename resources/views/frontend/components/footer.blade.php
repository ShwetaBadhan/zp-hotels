<!-- Footer -->
<footer>
    <div class="rx-main-footer padding-tb-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-3 col-sm-6 col-12 mb-24 footer-order-1">
                    <div class="rx-social-media">
                        <div class="rx-logo">
                            @php
                                $generalSetting = App\Models\GeneralSetting::first();
                            @endphp


                            <img src="{{ $generalSetting && $generalSetting->logo
    ? asset('storage/' . $generalSetting->logo)
    : asset('assets/img/logo/zphotel.png') }}" alt="logo">


                        </div>
                        <div class="inner-contact">
                            <p>{{ $generalSetting->intro ?? 'Our hotel seamlessly blends timeless
                                charm with modern amenities, offering
                                an unparalleled experience for travelers.' }}</p>
                        </div>
                        {{-- <div class="rx-social-logo">
                            <div class="inner-logo">
                                <a href="javascript:void(0)">
                                    <img src="assets/img/logo/logo-footer-1.png" alt="logo-footer-1">
                                </a>
                            </div>
                            <div class="inner-logo">
                                <a href="javascript:void(0)">
                                    <img src="assets/img/logo/logo-footer-2.png" alt="logo-footer-2">
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-2">
                    <div class="rx-footer-items">
                        <div class="rx-items-heading">
                            <h4>Explore</h4>
                        </div>
                        <div class="rx-items-contact">
                            <ul>
                                <li>
                                    <a href="{{ route('meetings-events') }}">Meeting & Events</a>
                                </li>
                                <li>
                                    <a href="{{ route('facilities') }}">Facilities</a>
                                </li>
                                <li>
                                    <a href="{{ route('nearby-attraction') }}">Near By Attractions</a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery') }}">Gallery</a>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-3">
                    <div class="rx-footer-items">
                        <div class="rx-items-heading">
                            <h4>City Branches</h4>
                        </div>
                        <div class="rx-items-contact">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">Bharat</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Mexico</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Venezuela</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Germany</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-4">
                    <div class="rx-footer-items">
                        <div class="rx-items-heading">
                            <h4>Contact</h4>
                        </div>
                        <div class="rx-items-contact">
                            <ul>
                                <li>
                                    <a href="{{ route('about-us') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us') }}">Contact Us</a>
                                </li>

                                <li>
                                    <a href="{{ route('zp-rooms') }}">Rooms</a>
                                </li>

                                <li>
                                    <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms-conditions') }}">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-6 col-420-full mb-24 footer-order-5">
                    <div class="rx-footer-other-info">
                        <div class="inner-info">
                            <h5>Address</h5>
                            <p>{{ $generalSetting->address ?? 'Raipur' }}</p>
                        </div>
                        <div class="inner-info">
                            <h5>Email</h5>
                            <a href="mailto:{{ $generalSetting->email ?? 'rasheed.khan.rk554@gmail.com' }}"
                                target="_blank">{{ $generalSetting->email ?? 'rasheed.khan.rk554@gmail.com' }}</a>
                        </div>
                        <div class="inner-info">
                            <h5>Phone No</h5>
                            <a href="tel:{{ $generalSetting->phone ?? '+917000872953' }}"
                                target="_blank">{{ $generalSetting->phone ?? '+917000872953' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rx-footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rx-footer-inner-contact">
                        <div class="rx-footer-left-side-contact">
                            <p>&copy; <?php echo date('Y')?> <a href="{{ route('home') }}">Zp Hotels</a> | Developed by
                                <a href="https://vibrantick.in/" target="_blank">Vibrantick Infotech Solutions</a>
                            </p>
                        </div>
                        @php
                            $socialSetting = App\Models\SocialSettings::first();
                        @endphp

                        <div class="rx-footer-last-logo">
                            @if($socialSetting && $socialSetting->facebook_url)
                                <div class="rx-inner-footer-logo">
                                    <a href="{{ $socialSetting->facebook_url }}" target="_blank">
                                        <i class="ri-facebook-line"></i>
                                    </a>
                                </div>
                            @endif

                            @if($socialSetting && $socialSetting->instagram_url)
                                <div class="rx-inner-footer-logo">
                                    <a href="{{ $socialSetting->instagram_url }}" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </div>
                            @endif

                            @if($socialSetting && $socialSetting->linkedin_url)
                                <div class="rx-inner-footer-logo">
                                    <a href="{{ $socialSetting->linkedin_url }}" target="_blank">
                                        <i class="ri-linkedin-line"></i>
                                    </a>
                                </div>
                            @endif

                            @if($socialSetting && $socialSetting->twitter_url)
                                <div class="rx-inner-footer-logo">
                                    <a href="{{ $socialSetting->twitter_url }}" target="_blank">
                                        <i class="ri-twitter-x-line"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>