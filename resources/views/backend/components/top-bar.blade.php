 <!-- Header -->
 <header class="lh-header">
     <div class="container-fluid">
         <div class="lh-header-items">
             <div class="left-header">
                 <a href="javascript:void(0)" class="lh-toggle-sidebar">
                     <span class="outer-ring">
                         <span class="inner-ring"></span>
                     </span>
                 </a>

             </div>
             <div class="right-header">


                 <div class="lh-right-tool display-screen">
                     <a class="lh-screen full" href="javascript:void(0)"><i class="ri-fullscreen-line"></i></a>
                     <a class="lh-screen reset" href="javascript:void(0)"><i class="ri-fullscreen-exit-line"></i></a>
                 </div>

                 <div class="lh-right-tool display-dark">
                     <a class="lh-mode dark" href="javascript:void(0)"><i class="ri-moon-clear-line"></i></a>
                     <a class="lh-mode light" href="javascript:void(0)"><i class="ri-sun-line"></i></a>
                 </div>
                 <div class="lh-right-tool lh-user-drop">
                     <div class="lh-hover-drop">
                         <div class="lh-hover-tool">
                             <img class="user" src="{{ url('backend/assets/img/user/1.jpg') }}" alt="user">
                         </div>
                         <div class="lh-hover-drop-panel right">
                             <div class="details">
                                 {{-- ✅ Dynamic Name & Email --}}
                                 <h6>{{ Auth::user()->name ?? 'Admin' }}</h6>
                                 <p>{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                             </div>

                             <ul class="border-top">
                                 <li>
                                     <a href="{{ route('admin.logout') }}"
                                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                         <i class="ri-logout-circle-r-line"></i> Logout
                                     </a>
                                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                         class="d-none">
                                         @csrf
                                     </form>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
