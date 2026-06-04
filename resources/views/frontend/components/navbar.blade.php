<!-- Header -->
<header>
    <div class="rx-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rx-inner-menu-desk">
                        <a href="{{ route('home') }}" class="rx-header-btn">
                            <img src="{{ asset('assets/img/logo/zphotel.png') }}" alt="logo">
                        </a>
                        <button class="navbar-toggler shadow-none rx-toggle-menu" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-2-line"></i>
                        </button>
                        <div class="rx-main-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item rx-dropdown">
                                    <a class="nav-link" href="{{ route('home') }}">Home</a>


                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                                </li>

                                <li class="nav-item rx-dropdown">
                                    <a class="nav-link" href="{{ route('zp-rooms') }}">Rooms</a>

                                </li>
                                <!-- <li class="nav-item rx-dropdown">
                                    <a class="nav-link rx-dropdown-item" href="javascript:void(0)">Pages</a>
                                    <ul class="rx-dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('about-us') }}">About Us</a></li>
                                        <li><a class="dropdown-item" href="{{ route('services') }}">Services</a></li>
                                        <li><a class="dropdown-item" href="{{ route('facilities')}}">Facilities</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('our-team') }}">Team</a></li>
                                        <li><a class="dropdown-item" href="{{ route('contact-us') }}">Contact Us</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('faqs') }}">Faq</a></li>
                                        <li><a class="dropdown-item" href="{{ route('spa') }}">Spa</a></li>
                                        <li><a class="dropdown-item" href="{{ route('checkout') }}">Checkout</a></li>
                                       
                                    </ul>
                                </li>
                                <li class="nav-item rx-dropdown">
                                    <a class="nav-link rx-dropdown-item" href="javascript:void(0)">Blog</a>
                                    <ul class="rx-dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('blogs') }}">Blog</a></li>
                                        <li><a class="dropdown-item" href="{{ route('blog-details')}}">Blog Details</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li class="nav-item rx-dropdown">
                                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>

                                </li>
                                <li class="nav-item rx-dropdown">
                                    <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>

                                </li>
                                

                            </ul>
                            <div class="header-button">
                                <a href="javascript:void(0)" class="rx-btn-one" data-bs-toggle="modal"
                                    data-bs-target="#rx_booking_from">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rx-mobile-menu-overlay"></div>
    <div id="rx-mobile-menu" class="rx-mobile-menu">
        <div class="rx-menu-title">
            <a href="{{ route('home') }}" class="rx-header-btn">
                <img src="{{ asset('assets/img/logo/zphotel.png') }}" alt="logo" style="width: 149px;">
            </a>
            <button type="button" class="rx-close-menu">×</button>
        </div>
        <div class="rx-menu-inner">
            <div class="rx-menu-contact">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>

                    </li>
                    <li>
                        <a href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('zp-rooms') }}">Rooms</a>

                    </li>
                    <!-- <li>
                        <a href="javascript:void(0)">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('facilities') }}">Facilities</a></li>
                            <li><a href="{{ route('our-team') }}">Team</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact</a></li>
                            <li><a href="{{ route('faqs') }}">Faq</a></li>
                            <li><a href="{{ route('spa') }}">Spa</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            {{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                            <li><a href="{{ route('blog-details') }}">Blog Details</a></li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="{{ route('gallery') }}">Gallery</a>

                    </li>
                    <li>
                        <a href="{{ route('contact-us') }}">Contact Us</a>

                    </li>

                </ul>
            </div>
            <div class="header-res-lan-curr">
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
</header>