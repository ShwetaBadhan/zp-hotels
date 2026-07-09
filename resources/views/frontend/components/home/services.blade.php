<!-- Services -->
<section class="section-services padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="assets/img/banner/left-shape.svg" alt="banner-left-shape"
                            class="svg-img left-side">Facilities<img src="assets/img/banner/right-shape.svg"
                            alt="banner-right-shape" class="svg-img right-side"></p>
                    <h4>Our Best <span>Services</span></h4>
                </div>
            </div>
            @php
                $roomServices = App\Models\RoomFacility::where('status', 'active')->latest()->get();
            @endphp

            @forelse($roomServices as $item)

                @php
                    $services = is_array($item->list)
                        ? $item->list
                        : json_decode(str_replace("'", '"', $item->list), true) ?? [];
                @endphp

                <div class="col-xl-2 col-lg-3 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left"
                    data-aos-duration="1000">

                    <div class="rx-services">

                        <div class="services-ico">
                            <i class="{{ $item->icon }}"></i>
                        </div>

                        <div class="services-contact">

                            <h5>{{ $item->title }}</h5>

                            <ul>
                                @forelse($services as $service)
                                    <li> {{ $service }}</li>
                                @empty
                                    <li>No facilities available.</li>
                                @endforelse
                            </ul>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="rx-services">
                        <div class="services-ico">
                            <img src="assets/img/services/2.svg" alt="services-2" class="svg-img">
                        </div>
                        <div class="services-contact">
                            <h5>Room Amenities</h5>
                            <ul>
                                <li>- Comfortable Bedding</li>
                                <li>- Bathroom & Pool</li>
                                <li>- Tv, Ac & Heathing</li>
                                <li>- Mini Bar & Safe</li>
                            </ul>
                        </div>
                    </div>
                </div>

            @endforelse
            </div>
    </div>
</section>