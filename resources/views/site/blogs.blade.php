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
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                        <h3 class="title">Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <div class="blog-list-area pt-70 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-grid">
                        <div class="row justify-content-center">
                            @foreach($blogs as $blog)
                                <div class="col-md-6 col-sm-9">
                                    <div class="blog-grid-item mt-50">
                                        <div class="blog-grid-thumb">
                                            <img src="{{ $blog->blog_image }}" alt="">
                                        </div>
                                        <div class="blog-grid-content">
                                            <span> {{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                                            <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->title]) }}">
                                                {{ substr($blog->title, 0, 50) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="shop-page-pagination d-flex justify-content-center mt-60">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{ $blogs->appends(request()->query())->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="blog-sidebar mt-50">
                        <div class="blog-search-item">
                            <form action="#">
                                <div class="input-box">
                                    <input type="text" placeholder="Search..">
                                    <button><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="blog-categories mt-30">
                            <div class="blog-sidebar-title">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            <div class="blog-recent-post">
                                @foreach($recentBlogs as $blog)
                                    <div class="item mt-10">
                                        <img src="{{ $blog->blog_image }}" alt="" style="width: 80px;height: 80px">
                                        <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->title]) }}">
                                            {{ $blog->title }}
                                        </a>
                                        <span>{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-newsletter">
                            <div class="blog-newsletter-title">
                                <h3 class="title">Newsletter</h3>
                                <form action="{{ route('send.subscriber') }}" method="post">
                                    @csrf
                                    <div class="input-box">
                                        <input type="text" name="email" placeholder="Enter email">
                                        <button class="main-btn">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== BLOG PART ENDS ======-->

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
