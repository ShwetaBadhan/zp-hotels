@php
    $faqs = App\Models\Faq::where('status', 'active')->latest()->get();

    $half = ceil($faqs->count() / 2);

    $leftFaqs = $faqs->take($half);
    $rightFaqs = $faqs->slice($half);
@endphp

<!-- Faq -->
<section class="section-faq padding-t-50 padding-b-100">
    <div class="container">
        <div class="row mb-minus-24">

            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="rx-banner text-center rx-banner-effects">
                    <p>
                        <img src="{{ asset('assets/img/banner/left-shape.svg') }}" alt=""
                            class="svg-img left-side">
                        FAQ
                        <img src="{{ asset('assets/img/banner/right-shape.svg') }}" alt=""
                            class="svg-img right-side">
                    </p>
                    <h4>Frequently Asked <span>Questions</span></h4>
                </div>
            </div>

            @if($faqs->count())

                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="rx-faq">
                        <div class="accordion" id="accordionLeft">

                            @forelse($leftFaqs as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="leftHeading{{ $faq->id }}">
                                        <button class="accordion-button shadow-none {{ $key != 0 ? 'collapsed' : '' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#leftCollapse{{ $faq->id }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">

                                            {{ $faq->question }}

                                        </button>
                                    </h2>

                                    <div id="leftCollapse{{ $faq->id }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordionLeft">

                                        <div class="accordion-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="rx-faq">
                        <div class="accordion" id="accordionRight">

                            @forelse($rightFaqs as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="rightHeading{{ $faq->id }}">
                                        <button class="accordion-button shadow-none {{ $key != 0 ? 'collapsed' : '' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#rightCollapse{{ $faq->id }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">

                                            {{ $faq->question }}

                                        </button>
                                    </h2>

                                    <div id="rightCollapse{{ $faq->id }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordionRight">

                                        <div class="accordion-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>

            @else

                <div class="col-12">
                    <div class="text-center py-5">
                        <h5>No FAQs Available</h5>
                        <p class="text-muted mb-0">
                            FAQs will be displayed here once they are added.
                        </p>
                    </div>
                </div>

            @endif

        </div>
    </div>
</section>