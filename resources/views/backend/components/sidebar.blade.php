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

                <li class="lh-sb-item" id="dashboard">
                    <a href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-3-line"></i>
                        <span class="">Dashboard

                        </span>
                    </a>
                </li>
                <li class="lh-sb-item-separator"></li>
                <!-- leads management -->
                <li class="lh-sb-title ">Leads Management :</li>
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i id="side-icon" class="ri-contacts-book-line"></i><span class=""><span
                                class="hover-title">Booking
                                Leads</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-contact-leads.index') }}">
                        <i id="side-icon" class="ri-bill-line"></i>
                        <span class="">Contact Leads

                        </span>
                    </a>
                </li>
                <!-- hotel and Resort -->
                <li class="lh-sb-item-separator"></li>

                <!-- Hotel | Resort -->
                <li class="lh-sb-title ">Hotel | Resort :</li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-event.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-calendar-event-line"></i><span class=""><span
                                class="hover-title">Manage
                                Events</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-facility.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-building-line"></i><span class=""><span class="hover-title">Manage
                                Facilities</span></span>
                    </a>
                </li>
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-gallery-line"></i><span class="">Manage Gallery<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        {{--
                        @can('manage-rooms') --}}
                        <li><a href="{{ route('admin-gallery-categories.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Gallery Categories</a></li>
                        {{-- @endcan
                        @can('view-rooms') --}}
                        <li><a href="{{ route('admin-gallery-images.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Gallery Images</a></li>
                        {{-- @endcan --}}

                    </ul>
                </li>
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-home-8-line"></i><span class="">Manage Rooms<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        {{--
                        @can('manage-rooms') --}}
                        <li><a href="{{ route('room-categories.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Room Categories</a></li>
                        <li><a href="{{ route('admin-room-facility.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Room Facilities</a></li>
                        {{-- @endcan
                        @can('view-rooms') --}}
                        <li><a href="{{ route('rooms.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>All Rooms</a></li>
                        {{-- @endcan --}}

                    </ul>
                </li>

                <li class="lh-sb-item">
                    <a href="{{ route('admin-nearby-attraction.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-map-pin-line"></i><span class=""><span class="hover-title">Nearby
                                Attractions</span></span>
                    </a>
                </li>

                <li class="lh-sb-item">
                    <a href="{{ route('admin-team.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-shield-user-line"></i><span class=""><span class="hover-title">Team
                                Member</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-testimonial.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-group-line"></i><span class=""><span
                                class="hover-title">Testimonials</span></span>
                    </a>
                </li>
                {{-- @endcan --}}




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
                        <li><a href="{{ route('admin-home-about.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>About Section</a></li>
                        <li><a href="{{ route('admin-slider.index') }}" class="lh-page-link drop"><i class="ri-arrow-right-s-line"></i>Manage Slider</a>
                        </li>
                    </ul>
                </li>
                <!-- About us page -->
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i id="side-icon" class="ri-home-8-line"></i><span class="">About Us Page<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        <li><a href="{{ route('admin-about.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>About Section</a></li>
                        <li><a href="{{ route('mission-vision.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Mission vision</a></li>
                    </ul>
                </li>
                <!-- event about -->
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                       <i id="side-icon" class="ri-calendar-event-line"></i><span class="">Events Page<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        <li><a href="{{ route('admin-event-about.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>About Section</a></li>
                    
                    </ul>
                </li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-faq.index') }}" class="lh-page-link">
                        <i id="side-icon" class="ri-question-line"></i><span class=""><span class="hover-title">Manage
                                FAQ's</span></span>
                    </a>
                </li>

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
                        <li><a href="{{ route('users.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>
                                Users</a></li>
                        <li><a href="{{ route('roles.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Manage Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}" class="lh-page-link drop"><i
                                    class="ri-arrow-right-s-line"></i>Permissions</a></li>
                    </ul>
                </li>
                {{-- @endcan --}}

                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i id="side-icon" class="ri-settings-3-line"></i><span class=""><span
                                class="hover-title">General
                                Settings</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i id="side-icon" class="ri-server-line"></i><span class=""><span class="hover-title">System
                                Config</span></span>
                    </a>
                </li>

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