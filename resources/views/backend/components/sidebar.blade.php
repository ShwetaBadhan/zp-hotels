<!-- sidebar -->
<div class="lh-sidebar-overlay"></div>
<div class="lh-sidebar" data-mode="light">
    <div class="lh-sb-logo">
        <a href="{{ route('dashboard') }}" class="sb-full"><img src="{{ url('assets/img/logo/zp.png') }}"
                alt="logo"></a>
        <a href="{{ route('dashboard') }}" class="sb-collapse"><img
                src="{{ url('backend/assets/img/logo/collapse-logo.png') }}" alt="logo"></a>
    </div>
    <div class="lh-sb-wrapper">
        <div class="lh-sb-content">
            <ul class="lh-sb-list">

                <!-- Dashboard -->
                <!-- removed condense class from menu if you want to solve bug then add condense to span tag -->
                @can('view-dashboard')
                    <li class="lh-sb-item" id="dashboard">
                        <a href="{{ route('dashboard') }}">
                            <i class="ri-dashboard-3-line"></i>
                            <span class="">Dashboard

                            </span>
                        </a>
                    </li>

                    <li class="lh-sb-item-separator"></li>
                @endcan
                <!-- leads management -->
                <li class="lh-sb-title ">Leads Management :</li>
                @can('manage-booking-leads')
                    <li class="lh-sb-item">
                        <a href="" class="lh-page-link">
                            <i id="side-icon" class="ri-contacts-book-line"></i><span class=""><span
                                    class="hover-title">Booking
                                    Leads</span></span>
                        </a>
                    </li>
                @endcan
                @can('manage-contact-leads')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-contact-leads.index') }}">
                            <i id="side-icon" class="ri-bill-line"></i>
                            <span class="">Contact Leads

                            </span>
                        </a>
                    </li>
                @endcan
                <!-- hotel and Resort -->
                <li class="lh-sb-item-separator"></li>

                <!-- Hotel | Resort -->
                <li class="lh-sb-title ">Hotel | Resort :</li>
                @can('manage-events')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-event.index') }}" class="lh-page-link">
                            <i id="side-icon" class="ri-calendar-event-line"></i><span class=""><span
                                    class="hover-title">Manage
                                    Events</span></span>
                        </a>
                    </li>
                @endcan
                @can('manage-facilities')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-facility.index') }}" class="lh-page-link">
                            <i id="side-icon" class="ri-building-line"></i><span class=""><span class="hover-title">Manage
                                    Facilities</span></span>
                        </a>
                    </li>
                @endcan

                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-gallery-line"></i><span class="">Manage Gallery<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        @can('manage-gallery-category')
                            <li><a href="{{ route('admin-gallery-categories.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>Gallery Categories</a></li>
                        @endcan
                        @can('manage-gallery')
                            <li><a href="{{ route('admin-gallery-images.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>Gallery Images</a></li>

                        @endcan
                    </ul>
                </li>
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-home-8-line"></i><span class="">Manage Rooms<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        @can('manage-room-category')
                            <li><a href="{{ route('room-categories.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>Room Categories</a></li>
                        @endcan
                        @can('manage-room-facilities')
                            <li><a href="{{ route('admin-room-facility.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>Room Facilities</a></li>
                        @endcan
                        @can('manage-room')
                            <li><a href="{{ route('rooms.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>All Rooms</a></li>
                        @endcan

                    </ul>
                </li>

                @can('manage-nearby-attraction')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-nearby-attraction.index') }}" class="lh-page-link">
                            <i id="side-icon" class="ri-map-pin-line"></i><span class=""><span class="hover-title">Nearby
                                    Attractions</span></span>
                        </a>
                    </li>
                @endcan
                @can('manage-team-member')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-team.index') }}" class="lh-page-link">
                            <i id="side-icon" class="ri-shield-user-line"></i><span class=""><span class="hover-title">Team
                                    Member</span></span>
                        </a>
                    </li>
                @endcan
                @can('manage-testimonials')
                    <li class="lh-sb-item">
                        <a href="{{ route('admin-testimonial.index') }}" class="lh-page-link">
                            <i id="side-icon" class="ri-group-line"></i><span class=""><span
                                    class="hover-title">Testimonials</span></span>
                        </a>
                    </li>
                @endcan




                {{-- @endcan --}}
                <li class="lh-sb-item-separator"></li>
                <li class="lh-sb-title ">CMS</li>
                {{-- @can('view-bookings') --}}

                <!-- home page -->
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-home-8-line"></i><span class="">Home Page<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        @can('manage-home-about')
                            <li><a href="{{ route('admin-home-about.index') }}" class="lh-page-link drop"><i
                                        class="ri-arrow-right-s-line"></i>About Section</a></li>
                        @endcan
                        @can('manage-home-slider')
                        <li><a href="{{ route('admin-slider.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Manage Slider</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <!-- About us page -->
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-home-8-line"></i><span class="">About Us Page<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        @can('manage-about-about')
                        <li><a href="{{ route('admin-about.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>About Section</a></li>
                        @endcan
                        @can('manage-about-mission')
                        <li><a href="{{ route('mission-vision.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Mission vision</a></li>
                        @endcan
                    </ul>
                </li>
                <!-- event about -->
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-calendar-event-line"></i><span class="">Events Page<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        @can('manage-event-about')
                        <li><a href="{{ route('admin-event-about.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>About Section</a></li>
                        @endcan
                    </ul>
                </li>
                @can('manage-faq')
                <li class="lh-sb-item">
                    <a href="{{ route('admin-faq.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-question-line"></i><span class=""><span class="hover-title">Manage
                                FAQ's</span></span>
                    </a>
                </li>
                @endcan
                @can('manage-privacy-policy')
                <li class="lh-sb-item">
                    <a href="{{ route('admin-privacy-policy.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-shield-check-line"></i>
                        <span><span class="hover-title">Manage Privacy Policy</span></span>
                    </a>
                </li>
                @endcan
                @can('manage-terms-conditions')

                <li class="lh-sb-item">
                    <a href="{{ route('admin-terms-conditions.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-file-list-3-line"></i>
                        <span><span class="hover-title">Manage Terms & Conditions</span></span>
                    </a>
                </li>
                @endcan
                <li class="lh-sb-item-separator"></li>

                <!--  Settings -->
                {{-- @can('view-settings') --}}
                <li class="lh-sb-title ">Settings</li>
                {{-- @can('manage-roles') --}}
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-magic-line"></i><span class="">Roles & Permissions<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        @can('manage-roles')
                        <li><a href="{{ route('users.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>
                                Users</a></li>
                        @endcan
                        @can('manage-permission')
                        <li><a href="{{ route('roles.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Manage Roles</a></li>
                        @endcan
                        <!-- <li><a href="{{ route('permissions.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Permissions</a></li> -->
                    </ul>
                </li>

                @can('manage-settings')

                <li class="lh-sb-item">
                    <a href="{{ route('admin-general-settings.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-settings-3-line"></i><span class=""><span
                                class="hover-title">General
                                Settings</span></span>
                    </a>
                </li>
                @endcan


                <li class="lh-sb-item-separator"></li>
                <li id="side-logout" class="lh-sb-item">
                    <a class="lh-page-link text-white" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ri-logout-circle-r-line"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>