@extends('site.layouts.app')

@section('content')
    <!--====== HERO PART START ======-->

    <section class="hero-area">
        @foreach($sliders as $index => $slider)
        <div class="hero-slide bg_cover" style="background-image: url({{ $slider->slider_image }});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="hero-content">
                            <span data-animation="fadeInLeft" data-delay=".1s">latest collection</span>
                            <h2 data-animation="fadeInLeft" data-delay="0.3s" class="title">{{ $slider->title }}</h2>
                            <p data-animation="fadeInLeft" data-delay="0.6s">{{ $slider->description }}</p>
                            <a data-animation="fadeInUp" data-delay="1.2s" class="main-btn" href="category-grid.html">Explore now</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="hero-thumb d-flex justify-content-end" data-animation="fadeInRight" data-delay="1.2s">
                            <img src="{{ asset('site/images/hero-item-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @if($index == 1)
                @break
            @endif
        @endforeach
    </section>

    <!--====== HERO PART ENDS ======-->

    <!--====== SHOP OFFER PART START ======-->

    <section class="shop-offer-area pb-120">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                @foreach($offers as $offer)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="shop-offer-item mt-30 ">
                            <img src="{{ $offer->offer_image }}" alt="offer">
                            <div class="shop-offer-overlay">
                                <div class="shop-offer-content">
                                    <span>{{ $offer->value }}% Off</span>
                                    <h4 class="title">{{ $offer->title }}</h4>
                                    <a class="main-btn" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== SHOP OFFER PART ENDS ======-->

    <!--====== CATEGORIES PART START ======-->

    <section class="categories-area featured-product">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3 class="title">Latest Product</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($products as $index => $product)
                    <div class="col-lg-3 col-md-6 col-sm-7">
                        <div class="categories-item mt-30">
                            <div class="categories-thumb">
                                <img src="{{ Storage::url('public/products/') . explode('|', $product->image)[0] }}" alt="product">
                                <div class="icon">
                                    <ul>
                                        <li>
                                            <a class="image-popup-2" href="{{ Storage::url('public/products/') . explode('|', $product->image)[0] }}">
                                                <i class="ti-search"></i>
                                            </a>
                                        </li>
                                        <li><a href="#"><i class="ti-heart"></i></a></li>
                                    </ul>
                                </div>
                                <span>{{ $product->status == 1 ? 'Sale' : 'Sold' }}</span>
                            </div>
                            <div class="categories-content">
                                <ul>
                                    @for($i = 0;$i < $product->rate;$i++)
                                        <li><a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}"><i class="fa fa-star"></i></a></li>
                                    @endfor
                                </ul>
                                <span>
                                    <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                        {{ $product->title }}
                                    </a>
                                </span>
                                <div class="cart-item">
                                    <a href="#">
                                        <i class="ti-shopping-cart-full"></i>
                                        <span>
                                            <span>${{ $product->offer_price }}</span>-${{ $product->price }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($index == 3)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!--====== CATEGORIES PART ENDS ======-->

    <!--====== LIMITED OFFER PART START ======-->

    <section class="limited-offer-area pb-120">
        <div class="container">
            <div class="row">
                @foreach($offers as $index => $offer)
                    <div class="col-lg-7">
                        <div class="limited-offer-thumb">
                            <img src="{{ $offer->offer_image }}" alt="thumb">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="limited-offer-content text-center">
                            <span>{{ $offer->title }}</span>
                            <h2 class="title">{{ $offer->value }}% off</h2>
                            <a class="main-btn" href="#">get offer now</a>
                            <p>Limited Time Offer</p>
                        </div>
                    </div>
                    @if($index == 0)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!--====== LIMITED OFFER PART ENDS ======-->

    <!--====== CATEGORIES PART START ======-->

    <section class="categories-area pb-120 pt-120">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3 class="title">POPULAR CATEGORIES</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="categories-tab-btns d-flex justify-content-lg-end justify-content-start">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($categories as $index => $category)
                                <li class="nav-item">
                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="pills-{{ str_replace(' ', '-', $category->name ) }}-tab" data-toggle="pill" href="#pills-{{ str_replace(' ', '-', $category->name ) }}" role="tab" aria-controls="pills-{{ str_replace(' ', '-', $category->name ) }}" aria-selected="true">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach($categories as $index => $category)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="pills-{{ str_replace(' ', '-', $category->name ) }}" role="tabpanel" aria-labelledby="pills-{{ str_replace(' ', '-', $category->name ) }}-tab">
                        <div class="row justify-content-center">
                            @foreach($category->products()->limit(8)->get() as $product)
                            <div class="col-lg-3 col-md-6 col-sm-7">
                                <div class="categories-item mt-30">
                                    <div class="categories-thumb">
                                        <img src="{{ Storage::url('public/products/') . explode('|', $product->image)[0] }}" alt="product">
                                        <div class="icon">
                                            <ul>
                                                <li><a class="image-popup" href="{{ Storage::url('public/products/') . explode('|', $product->image)[0] }}"><i class="ti-search"></i></a></li>
                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <span>{{ $product->status == 1 ? 'Sale' : 'Sold' }}</span>
                                    </div>
                                    <div class="categories-content">
                                        <ul>
                                            @for($i = 0;$i < $product->rate;$i++)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endfor
                                        </ul>
                                        <span>
                                            <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                {{ $product->title }}
                                            </a>
                                        </span>
                                        <div class="cart-item">
                                            <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                <i class="ti-shopping-cart-full"></i>
                                                <span><span>${{ $product->offer_price }}</span> -${{ $product->price }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--====== CATEGORIES PART ENDS ======-->

    <!--====== EQUIPMENT PART START ======-->

    @foreach($offers as $index => $offer)
        @if($index == 1)
        <section class="equipment-area bg_cover d-flex align-items-center" style="background-image: url({{ $offer->offer_image }});">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="equipment-content text-center">
                            <span>{{ $offer->title }}</span>
                            <h2 class="title"><span>{{ $offer->value }}%</span> off</h2>
                            <div id="simple_timer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endforeach

    <!--====== EQUIPMENT PART ENDS ======-->

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

    <!--====== SERVICES PART START ======-->

    <section class="services-area">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-services mt-30">
                            <img src="{{ $service->service_image }}" alt="icon">
                            <h3 class="title">{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== NEWS PART START ======-->

    <section class="blog-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title pb-10">
                        <h3 class="title">Recent blog article</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="blog-item mt-30">
                            <div class="blog-thumb">
                                <img src="{{ $blog->blog_image }}" alt="">
                            </div>
                            <div class="blog-content">
                                <ul>
                                    <li>Post by {{ $blog->author }}</li>
                                </ul>
                                <h4 class="title">
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->title]) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                {!! substr($blog->content, 0, 30) !!}
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->title]) }}">
                                    Read More <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== NEWS PART ENDS ======-->

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
