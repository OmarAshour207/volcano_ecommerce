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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Single Product</li>
                            </ol>
                        </nav>
                        <h3 class="title">{{ $product->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== PROCUCT SINGLE PART START ======-->

    <section class="product-single-area pt-90 pb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-thumb-item mt-30">
                        @php
                            $images = explode('|', $product->image);
                        @endphp
                        <div class="product-single-thumb">
                            @for($i = 0;$i < (count($images)-1); $i++)
                                <div class="item">
                                    <img src="{{ Storage::url('public/products/' . $images[$i]) }}" alt="{{ $product->title }}">
                                </div>
                            @endfor
                        </div>
                        <div class="product-thumb mt-20">
                            @for($i = 0;$i < (count($images)-1); $i++)
                                <div class="item">
                                    <img src="{{ Storage::url('public/products/' . $images[$i]) }}" alt="{{ $product->title }}" style="width: 183px;height: 160px">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content mt-30">
                        <div class="product-single-content-item">
                            <h3 class="title">{{ $product->title }}</h3>
                            <div class="price">
                                <span>${{ $product->offer_price }} <span>${{ $product->price }}</span></span>
                            </div>
                            <ul>
                                @for($i = 0;$i < $product->rate;$i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                                @for($i = 0;$i < (5 - $product->rate);$i++)
                                    <li><i class="fa fa-star-o"></i></li>
                                @endfor
                            </ul>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="product-quantity-item d-flex align-items-center">
                            <p style="font-size: 24px;">{{ $product->status == 1 ? 'Sale' : 'Sold' }}</p>
                        </div>
                        <div class="product-btns d-block d-xl-flex align-items-center">
                            <ul>
                                <li><a class="main-btn main-btn-2" href="#">Buy now</a></li>
                            </ul>
                        </div>
                        <div class="product-tags">
                            <ul>
                                <li><span>Category:  </span></li>
                                <li>
                                    <a href="{{ route('category.products', ['id' => $product->category->id, 'title' => $product->category->name]) }}">
                                        {{ $product->category->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PROCUCT SINGLE PART ENDS ======-->

    <!--====== SIMILAR PRODUCTS PART START ======-->

    <section class="similar-products-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="similar-products-title">
                        <h3 class="title">Similar Products</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($similarProducts as $similar)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="categories-item mt-30">
                            <div class="categories-thumb">
                                <img src="{{ Storage::url('public/products/' . explode('|', $similar->image)[0]) }}" alt="{{ $similar->title }}">
                                <div class="icon">
                                    <ul>
                                        <li><a class="image-popup" href="{{ Storage::url('public/products/' . explode('|', $similar->image)[0]) }}"><i class="ti-search"></i></a></li>
                                        <li>
                                            <a href="{{ route('product.show', ['id' => $similar->id, 'title' => $similar->title]) }}">
                                                <i class="ti-control-shuffle"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <span>{{ $similar->status == 1 ? 'SALE' : 'Sold' }}</span>
                            </div>
                            <div class="categories-content">
                                <ul>
                                    @for($i = 0;$i < $similar->rate;$i++)
                                        <li>
                                            <a href="{{ route('product.show', ['id' => $similar->id, 'title' => $similar->title]) }}">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                    @endfor
                                    @for($i = 0;$i < (5 - $similar->rate);$i++)
                                        <li>
                                            <a href="{{ route('product.show', ['id' => $similar->id, 'title' => $similar->title]) }}">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                                <span>
                                    <a href="{{ route('product.show', ['id' => $similar->id, 'title' => $similar->title]) }}">
                                        {{ $similar->title }}
                                    </a>
                                </span>
                                <div class="cart-item">
                                    <a href="{{ route('product.show', ['id' => $similar->id, 'title' => $similar->title]) }}">
                                        <i class="ti-shopping-cart-full"></i>
                                        <span>
                                            <span>${{ $similar->price }}</span> -${{ $similar->offer_price }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--====== SIMILAR PRODUCTS PART ENDS ======-->

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
