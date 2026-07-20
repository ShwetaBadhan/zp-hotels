@php
    $missionVission = App\Models\MissionVision::where('is_active', true)->first();
@endphp
<!-- Rooms -->
<section class="section-room padding-t-50 padding-b-100">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p><img src="{{ asset('assets/img/banner/left-shape.svg') }}" alt="banner-left-shape"
                            class="svg-img left-side">{{ $missionVission->sub_title ?? ' Our Purpose' }}<img
                            src="{{ asset('assets/img/banner/right-shape.svg') }}" alt="banner-right-shape"
                            class="svg-img right-side"></p>
                    <h4>{{ $missionVission->main_title ?? 'Mission & Vision' }}</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-rooms-box-2">
                    <div class="rx-rooms-img">
                        <img src="{{ isset($missionVission->mission_image) ? asset('storage/'.$missionVission->mission_image) : asset('assets/img/about/mission.jpg') }}" alt="room-1">
                        <div class="inner-back-side">
                            <div class="sub-title">
                                <h5>{{ $missionVission->mission_main_title ?? 'Delivering Exceptional Hospitality' }}</h5>
                                <span class="rx-price">{{ $missionVission->mission_sub_title ?? 'Our Mission' }}</span>
                            </div>
                            <div class="inner-info">
                                <p>{{ $missionVission->mission ?? 'At our hotel, our mission is to provide exceptional hospitality through personalized
                                    service, comfortable accommodations, and memorable experiences. We are dedicated to
                                    creating a welcoming environment where every guest feels valued, cared for, and
                                    inspired to return. Through attention to detail and a commitment to excellence, we
                                    strive to make every stay truly unforgettable.' }}</p>
                            </div>
                            <div class="rx-button">
                                <!-- <a href="room-details.html" class="rx-btn-one">Book Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="200">
                <div class="rx-rooms-box-2">
                    <div class="rx-rooms-img">
                       <img src="{{ !empty($missionVission->vision_image) ? asset('storage/'.$missionVission->vision_image) : asset('assets/img/about/vision.jpg') }}" alt="room-2">
                        <div class="inner-back-side">
                            <div class="sub-title">
                                <h5>{{ $missionVission->vision_main_title ?? 'Shaping the Future of Hospitality' }}</h5>
                                <span class="rx-price">{{ $missionVission->vision_sub_title ?? 'Our Vision' }}</span>
                            </div>
                            <div class="inner-info">
                                <p>{{ $missionVission->vision ?? 'Our vision is to be a preferred destination for travelers seeking comfort, luxury,
                                    and genuine hospitality. We aspire to set new standards in guest satisfaction by
                                    continuously enhancing our services, embracing innovation, and creating experiences
                                    that leave a lasting impression. Through our passion for hospitality, we aim to
                                    build meaningful connections with guests from around the world.' }}</p>
                            </div>
                            <div class="rx-button">
                                <!-- <a href="room-details.html" class="rx-btn-one">Book Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>