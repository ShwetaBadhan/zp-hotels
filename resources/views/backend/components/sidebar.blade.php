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
                {{-- @can('view-dashboard') --}}
                <li class="lh-sb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-3-line"></i>
                        <span class="">Dashboard

                        </span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="{{ route('admin-contact-leads.index') }}">
                        <i class="ri-dashboard-3-line"></i>
                        <span class="">Contact Leads

                        </span>
                    </a>
                </li>
                {{-- @endcan --}}

                <li class="lh-sb-item-separator"></li>

                <!-- Apps: Staff -->
                {{-- @can('view-users') --}}
                <li class="lh-sb-title ">Apps</li>
               
                <li class="lh-sb-item">
                    <a href="{{ route('admin-team.index') }}" class="lh-page-link">
                        <i class="ri-shield-user-line"></i><span class=""><span class="hover-title">Team Member</span></span>
                    </a>
                </li>
                {{-- @endcan --}}

                <li class="lh-sb-item-separator"></li>

                <!-- Hotel | Resort -->
                <li class="lh-sb-title ">Hotel | Resort</li>
                {{-- @can('view-bookings') --}}
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-group-line"></i><span class=""><span class="hover-title">Guest</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-user-search-line"></i><span class=""><span class="hover-title">Guest
                                Details</span></span>
                    </a>
                </li>

                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i class="ri-home-8-line"></i><span class="">Manage Gallery<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        {{--
                        @can('manage-rooms') --}}
                        <li><a href="{{ route('admin-gallery-categories.index') }}" class="lh-page-link drop"><i
                                    class="ri-stack-line"></i>Gallery Categories</a></li>
                        {{-- @endcan
                        @can('view-rooms') --}}
                        <li><a href="{{ route('admin-gallery-images.index') }}" class="lh-page-link drop"><i
                                    class="ri-layout-grid-line"></i>Gallery</a></li>
                        {{-- @endcan --}}

                    </ul>
                </li>
                {{-- @endcan --}}


                {{-- @endcan --}}
                {{-- @can('view-rooms') --}}
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i class="ri-home-8-line"></i><span class="">Rooms Admin<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">


                        {{--
                        @can('manage-rooms') --}}
                        <li><a href="{{ route('room-categories.index') }}" class="lh-page-link drop"><i
                                    class="ri-stack-line"></i>Room Categories</a></li>
                        {{-- @endcan
                        @can('view-rooms') --}}
                        <li><a href="{{ route('rooms.index') }}" class="lh-page-link drop"><i
                                    class="ri-layout-grid-line"></i>All Rooms</a></li>
                        {{-- @endcan --}}

                    </ul>
                </li>
                {{-- @endcan --}}
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-user-search-line"></i><span class=""><span class="hover-title">Our
                                Blogs</span></span>
                    </a>
                </li>

                {{-- @can('view-bookings') --}}
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-contacts-book-line"></i><span class=""><span
                                class="hover-title">Bookings</span></span>
                    </a>
                </li>
                {{-- @endcan
                @can('view-invoices') --}}
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-bill-line"></i><span class=""><span class="hover-title">Invoice</span></span>
                    </a>
                </li>
                {{-- @endcan --}}

                <li class="lh-sb-item-separator"></li>

                <!-- 🆕 Settings -->
                {{-- @can('view-settings') --}}
                <li class="lh-sb-title ">Settings</li>
                {{-- @can('manage-roles') --}}
                <li class="lh-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="lh-drop-toggle">
                        <i class="ri-magic-line"></i><span class="">Roles & Permissions<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span>
                    </a>
                    <ul class="lh-sb-drop ">
                        <li><a href="{{ route('users.index') }}" class="lh-page-link drop"><i class="ri-user-line"></i>
                                Users</a></li>
                        <li><a href="{{ route('roles.index') }}" class="lh-page-link drop"><i
                                    class="ri-shield-line"></i>Manage Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}" class="lh-page-link drop"><i
                                    class="ri-key-line"></i>Permissions</a></li>
                    </ul>
                </li>
                {{-- @endcan --}}

                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-settings-3-line"></i><span class=""><span class="hover-title">General
                                Settings</span></span>
                    </a>
                </li>
                <li class="lh-sb-item">
                    <a href="" class="lh-page-link">
                        <i class="ri-server-line"></i><span class=""><span class="hover-title">System
                                Config</span></span>
                    </a>
                </li>
                {{-- @endcan
                @endcan --}}

            </ul>
        </div>
    </div>
</div>