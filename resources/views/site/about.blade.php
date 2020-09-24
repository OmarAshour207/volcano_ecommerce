@push('styles')
    <style>
        .about-store-area::before {
            background-image: url("{{ $aboutUs->about_image }}");
        }
    </style>
@endpush

@extends('site.layouts.app')

@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area bg_cover d-flex align-items-center" style="background-image: url({{ asset('site/images/page-bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About us</li>
                            </ol>
                        </nav>
                        <h3 class="title">About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== ABOUT SERVICES PART START ======-->

    <section class="about-srvices-area pt-120 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">Expect something extra</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $index => $service)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="about-services mt-30">
                            <div class="thumb">
                                <img src="{{ $service->service_image }}" alt="">
                            </div>
                            <h4 class="title">{{ $service->title }}</h4>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                    @if($index == 3)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!--====== ABOUT SERVICES PART ENDS ======-->

    <!--====== ABOUT STORE PART START ======-->

    <section class="about-store-area pt-70 pb-65">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="about-store-content">
                        <h3 class="title">Welcome to our store</h3>
                        <p>Gathered man man after subdue fill in created void that forth light may first fruits given meat god. Woner kind our signs it he yielding hath is blessed moveth light very of creature multiply Image man</p>
                        @foreach($services as $index => $service)
                            <div class="store-item mt-40">
                                <img src="{{ $service->service_image }}" alt="">
                                <h4 class="title">{{ $service->title }}</h4>
                                <p>{{ $service->description }}</p>
                            </div>
                            @if($index == 2)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ABOUT STORE PART ENDS ======-->

    <!--====== FEEDBACK PART START ======-->

    <section class="feedback-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title pb-10">
                        <h3 class="title">Customer feedback</h3>
                    </div>
                </div>
            </div>
            <div class="row feedback-active">
                @foreach($testimonials as $testimonial)
                    <div class="col-lg-12">
                        <div class="feedback-item text-center mt-30">
                            <img src="{{ $testimonial->testimonial_image }}" alt="quote">
                            <p>{{ $testimonial->description }}</p>
                            <div class="info">
                                <h4 class="title">{{ $testimonial->name }}</h4>
                                <span>{{ $testimonial->title }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== FEEDBACK PART ENDS ======-->

    <!--====== ABOUT TEAM PART START ======-->

    <section class="about-team-area pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">meet our member</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($teamMembers as $teamMember)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-item mt-30">
                            <div class="team-thumb">
                                <img src="{{ $teamMember->member_image }}" alt="team">
                                <div class="social">
                                    <ul>
                                        @php
                                            $sites = ['facebook', 'twitter', 'instagram'];
                                        @endphp
                                        @for($i = 0; $i < count($sites);$i++)
                                            <li>
                                                <a href="{{ setting($sites[$i]) }}">
                                                    <i class="ti-{{ $sites[$i] }}"></i>
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="#">{{ $teamMember->name }}</a>
                                <span>{{ $teamMember->title }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== ABOUT TEAM PART ENDS ======-->

    <!--====== SUBSCRIBE PART START ======-->

    <div class="subscribe-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="subscribe-item text-center">
                        <h3 class="title">Subscribe & Get update everyday</h3>
                        <form action="{{ route('send.subscriber') }}" method="post">
                            @csrf
                            <div class="input-box">
                                <input name="email" type="email" placeholder="enter your email">
                                <button class="main-btn">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== SUBSCRIBE PART ENDS ======-->


@endsection
