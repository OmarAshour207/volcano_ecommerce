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
                                <li class="breadcrumb-item active" aria-current="page">Category Products</li>
                            </ol>
                        </nav>
                        <h3 class="title">Shop Category</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CATEGORY PAGE PART START ======-->

    <section class="category-page-area pt-90 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-5 col-sm-7 order-2 order-lg-1">
                    <div class="category-page-sidebar">
                        <div class="category-browse category-sidebar mt-30">
                            <div class="category-sidebar-title">
                                <h3 class="title">Browse Category</h3>
                            </div>
                            <div class="category-browse-item">
                                <ul class="radio_common radio_style2">
                                    @foreach($categories as $index => $category)
                                        <li>
                                            <input type="radio" {{ request()->route('id') == $category->id ? 'checked' : '' }} name="category_id" value="{{ $category->id }}" id="radio{{ $index }}">
                                            <label for="radio{{ $index }}"><span></span>{{ $category->name }} ({{ $category->products_count }})</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="category-filter category-sidebar mt-30">
                            <div class="category-sidebar-title">
                                <h3 class="title">Price Filter</h3>
                            </div>
                            <div class="category-filter-item">
                                <div class="price-range-box ">
                                    <form>
                                        <div id="slider-range"></div>
                                        <button type="submit">Filter</button>
                                        <span>Price:</span>
                                        <input type="text" name="price" id="amount" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-offer mt-30">
                            <div class="sidebar-offer-thumb">
                                <img src="{{ asset('site/images/sidebar-offer.jpg') }}" alt="">
                                <div class="sidebar-offer-content">
                                    <h3 class="title">Up to <span>50% <span>off</span></span></h3>
                                    <a class="main-btn" href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="category-page-item mt-30">
                        <div class="category-page-topbar d-block d-md-flex justify-content-between align-items-center">
                            <div class="item-2 d-flex align-items-center">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="ti-layout-grid2-alt"></i></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="ti-list"></i></a>
                                    </li>
                                </ul>
                                <form>
                                    <div class="input-box">
                                        <input type="text" name="name" placeholder="Search" value="{{ request('name') ?? '' }}">
                                        <button><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-page-list">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="categories-item mt-30">
                                                    <div class="categories-thumb">
                                                        <img src="{{ Storage::url('public/products/' . explode('|', $product->image)[0]) }}" alt="product">
                                                        <div class="icon">
                                                            <ul>
                                                                <li><a class="image-popup-2" href="{{ Storage::url('public/products/' . explode('|', $product->image)[0]) }}"><i class="ti-search"></i></a></li>
                                                                <li><a href="#"><i class="ti-control-shuffle"></i></a></li>
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

                                                        <span>
                                                            @foreach($product->attributes as $attribute)
                                                            <a href="{{ route('attribute.show', ['id' => $attribute->id, 'title' => $attribute->name]) }}" style="text-decoration: underline">
                                                                {{ $attribute->name }}
                                                            </a>
                                                            @endforeach
                                                        </span>

                                                        <div class="cart-item">
                                                            <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                                <i class="ti-shopping-cart-full"></i> <span><span>{{ __('home.currency') }}{{ $product->offer_price }}</span> -{{ __('home.currency') }}{{ $product->price }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="shop-page-list-area">
                                        @foreach($products as $product)
                                            <div class="shop-page-list-item mt-30 mb-60">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-5">
                                                        <div class="shop-page-list-thumb">
                                                            <img src="{{ Storage::url('public/products/' . explode('|', $product->image)[0]) }}" alt="list">
                                                            <div class="icon">
                                                                <ul>
                                                                    <li>
                                                                        <a class="image-popup" href="{{ Storage::url('public/products/' . explode('|', $product->image)[0]) }}">
                                                                            <i class="ti-search"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                                            <i class="ti-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7">
                                                        <div class="shop-page-list-content">
                                                            <a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                                <h3 class="title">
                                                                    {{ $product->title }}
                                                                </h3>
                                                            </a>
                                                            <div class="icon">
                                                                <ul>
                                                                    @for($i = 0;$i < $product->rate;$i++)
                                                                        <li><a href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}"><i class="fa fa-star"></i></a></li>
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <div class="icon">
                                                                <ul>
                                                                    @foreach($product->attributes as $attribute)
                                                                        <li>
                                                                            <a href="{{ route('attribute.show', ['id' => $attribute->id, 'title' => $attribute->name]) }}">
                                                                                {{ $attribute->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <p>{{ $product->description }}</p>
                                                            <div class="cart-price">
                                                                <ul>
                                                                    <li>
                                                                        <a class="btn" href="{{ route('product.show', ['id' => $product->id, 'title' => $product->title]) }}">
                                                                            {{ __('home.currency') }}{{ $product->offer_price }} <span>-{{ __('home.currency') }}{{ $product->price }}</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-page-pagination d-flex justify-content-center mt-60">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $products->appends(request()->query())->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== CATEGORY PAGE PART ENDS ======-->

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
