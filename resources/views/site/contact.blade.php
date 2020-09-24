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
                                <li class="breadcrumb-item active" aria-current="page">contact</li>
                            </ol>
                        </nav>
                        <h3 class="title">contact us</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT INFO PART START ======-->

    <section class="contact-info-area pt-85 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item mt-30">
                        <img src="{{ asset('site/images/icon/icon-12.png') }}" alt="icon">
                        <h5 class="title">Our Address</h5>
                        <p>{{ setting('en_address') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item mt-30">
                        <img src="{{ asset('site/images/icon/icon-13.png') }}" alt="icon">
                        <h5 class="title">Phone Number</h5>
                        <ul>
                            <li><a href="#">Order issue: {{ setting('phone') }}</a></li>
                            <li><a href="tel:01253481425">Support: {{ setting('phone') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-item mt-30">
                        <img src="{{ asset('site/images/icon/icon-14.png') }}" alt="icon">
                        <h5 class="title">Our Address</h5>
                        <ul>
                            <li><a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CONTACT INFO PART ENDS ======-->

    <!--====== CONTACT FORM PART START ======-->

    <section class="contact-form-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="title">Contact with us</h3>
                    </div>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    Sent Successfully
                </div>
            @endif
            <form action="{{ route('send.contact') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-box mt-30">
                            <textarea name="message" id="#" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="input-box mt-30">
                            <input type="text" name="name" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="input-box mt-30">
                            <input type="email" name="email" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-box mt-30">
                            <button class="main-btn" type="button">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!--====== CONTACT FORM PART ENDS ======-->

@endsection
