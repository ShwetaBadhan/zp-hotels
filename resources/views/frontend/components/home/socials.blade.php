@php
    $socialFeed = \App\Models\SocialFeed::where('is_active', 1)->first();
@endphp
@if($socialFeed)
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
                    @php
                        $facebookPage = $socialFeed->facebook_page ?? 'https://www.facebook.com/DrITMCX';
                    @endphp
                    <div class="zp-social-frame">

                        <div id="fb-root"></div>

                        <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v23.0"></script>

                        <div class="fb-page" data-href="{{ $facebookPage }}" data-tabs="timeline" data-width="500"
                            data-height="550" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="{{ $facebookPage }}" class="fb-xfbml-parse-ignore">
                                <a href="{{ $facebookPage }}">Facebook</a>
                            </blockquote>
                        </div>

                    </div>
                    <!-- <div class="zp-social-frame zp-coming-soon">
                                <i class="ri-time-line"></i>
                                <h5>Coming Soon</h5>
                                <p>Our Facebook page will be available soon. Stay tuned!</p>
                            </div> -->
                </div>



                <div class="zp-social-card">

                    <div class="zp-social-title">
                        <i class="ri-instagram-line"></i>
                        <h4>Instagram</h4>
                    </div>

                    <div class="zp-social-frame">

                       {!! $socialFeed->instagram_embed ?? '
                                    <blockquote class="instagram-media"
                                        data-instgrm-permalink="https://www.instagram.com/p/DYPAFPZk5b8/"
                                        data-instgrm-version="14">
                                    </blockquote>
                                ' !!}

                    </div>

                </div>

               





            </div>

        </div>
    </section>

@endif