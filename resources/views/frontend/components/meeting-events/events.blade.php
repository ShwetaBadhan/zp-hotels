@php
    $events = \App\Models\Event::where('status', 'active')
        ->latest()
        ->get();
@endphp
<section class="section-blog padding-t-50 padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape"
                            class="svg-img left-side">Meetings and Events<img src="assets/img/banner/right-shape.svg"
                            alt="banner-right-shape" class="svg-img right-side"></p>
                    <h4>Meetings and Events </h4>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="owl-carousel rx-blog-slider" id="rxblogslider">
                    @forelse($events as $event)
                                    <div class="rx-blog-card">
                                        <div class="rx-blog-img">
                                            <img src="{{ !empty($event->image)
                        ? asset('storage/' . $event->image)
                        : asset('assets/img/blog/1.jpg') }}" alt="{{ $event->title }}">
                                        </div>

                                        <div class="rx-blog-contact">
                                            <span>
                                                {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                                                - {{ $event->sub_title }}
                                            </span>

                                            <h4>
                                                <a href="{{ route('meetings-events-detail', $event->id) }}">
                                                    {{ $event->title }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                    @empty
                        <div class="rx-blog-card">
                            <div class="rx-blog-img">
                                <img src="{{ asset('assets/img/blog/1.jpg') }}" alt="No Events">
                            </div>

                            <div class="rx-blog-contact">
                                <span>No Events Available</span>
                                <h4>No meetings or events found.</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>