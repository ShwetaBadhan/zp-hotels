<!-- Team -->
<section class="section-team padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape" class="svg-img left-side">Our
                        Team<img src="assets/img/banner/right-shape.svg" alt="banner-right-shape"
                            class="svg-img right-side"></p>
                    <h4>Exceptional <span>Experts</span></h4>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="owl-carousel rx-team-slider">
                    @php
                        $team = \App\Models\Team::where('status' , 'active')->latest()->get() ?? collect();
                       @endphp
                    @forelse($team as $item)
                        <div class="rx-team-card">
                            <div class="rx-team-img">
                                <img src="{{ asset($item->image ? 'storage/' . $item->image : 'assets/img/team/1.jpg') }}"
                                    alt="team-1">
                                <div class="rx-team-social-media">
                                    @if($item->facebook_url)
                                        <div class="social-media-item">
                                            <a href="{{ $item->facebook_url }}" target="_blank">
                                                <i class="ri-facebook-line"></i>
                                            </a>
                                        </div>
                                    @endif

                                    @if($item->instagram_url)
                                        <div class="social-media-item">
                                            <a href="{{ $item->instagram_url }}" target="_blank">
                                                <i class="ri-instagram-line"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="rx-team-contact">
                                <h5>{{ $item->name }}</h5>
                                <p>({{ $item->designation }})</p>
                            </div>
                        </div>
                    @empty
                        <div class="rx-team-card">
                            <div class="rx-team-img">
                                <img src="assets/img/team/1.jpg" alt="team-1">
                                <div class="rx-team-social-media">
                                    <div class="social-media-item">
                                        <a href="javascript:void(0)"><i class="ri-facebook-line"></i></a>
                                    </div>
                                    <div class="social-media-item">
                                        <a href="javascript:void(0)"><i class="ri-instagram-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="rx-team-contact">
                                <h5>Mr. Oliver Carter</h5>
                                <p>(CEO)</p>
                            </div>
                        </div>
                    @endforelse
                   
                </div>
            </div>
        </div>
    </div>
</section>