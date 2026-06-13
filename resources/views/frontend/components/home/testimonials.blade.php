<!-- Testimonials -->
<section class="section-testimonials padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape"
                            class="svg-img left-side">Testimonials<img src="assets/img/banner/right-shape.svg"
                            alt="banner-right-shape" class="svg-img right-side"></p>
                    <h4>Echoes of <span>Brilliance</span></h4>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="owl-carousel rx-testimonials-slider">
                    @php
                        $testimonials = App\Models\Testimonial::where('status', 'active')->latest()->get() ?? collect();
                    @endphp
                    @forelse($testimonials as $item)
                        <div class="row mb-minus-24">
                            <div class="col-md-4 col-12 mb-24">
                                <div class="rx-testimonials-img">
                                    <img src="{{ asset($item->image ? 'storage/' . $item->image : 'assets/img/testimonials/1.jpg') }}"
                                        alt="testimonials-1">
                                </div>
                            </div>
                            <div class="col-md-8 col-12 mb-24">
                                <div class="rx-testimonials-contact">
                                    <div class="rx-inner-banner">
                                        <h4>{{ $item->name ? $item->name : 'Isabella Bianchi' }}</h4>
                                        <span>({{ $item->designation ? $item->designation : 'Manager' }})</span>
                                    </div>
                                    <div class="inner-contact">
                                        <p>"{{ $item->description ? $item->description : 'I am recommending this to you as i have good experience there' }}"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row mb-minus-24">
                            <div class="col-md-4 col-12 mb-24">
                                <div class="rx-testimonials-img">
                                    <img src="assets/img/testimonials/2.jpg" alt="testimonials-2">
                                </div>
                            </div>
                            <div class="col-md-8 col-12 mb-24">
                                <div class="rx-testimonials-contact">
                                    <div class="rx-inner-banner">
                                        <h4>Saddika Alard</h4>
                                        <span>(Team Leader)</span>
                                    </div>
                                    <div class="inner-contact">
                                        <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                            at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                            amet alias aut."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>