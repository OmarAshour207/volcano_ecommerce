
<!--===== HEADER= PART START ======-->

<header class="header-area">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-top-item d-block d-md-flex justify-content-between align-items-center">
                        <div class="header-contact">
                            <ul>
                                <li><a href="tel:{{ setting('phone') }}">Call us: {{ setting('phone') }}</a></li>
                                <li><a href="mailto:{{ setting('email') }}">Email: {{ setting('email') }}</a></li>
                            </ul>
                        </div>
                        <div class="header-top-btns">
                            <ul>
                                <li><a href="{{ url('contact-us') }}"> Help & Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="main-header-items d-none d-md-flex justify-content-end align-items-center">
                        <form action="#">
                            <div class="input-box">
                                <input type="text" placeholder="Search for product">
                                <button><i class="ti-search"></i></button>
                            </div>
                        </form>
                        <ul>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button> <!-- navbar toggler -->

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"> category <i class="ti-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach(\App\Models\Category::where('parent_id', null)->with('child')->limit(6)->get() as $index => $category)
                                                <li>
                                                    <a href="{{ route('category.products', ['id' => $category->id, 'title' => $category->name]) }}">
                                                        {{ $category->name }}
                                                        @if ($category->child->count() > 0)
                                                            <i class="ti-angle-right"></i>
                                                        @endif
                                                    </a>
                                                    @if ($category->child->count() > 0)
                                                        <ul class="sub-menu">
                                                            @foreach($category->child as $child)
                                                                <li>
                                                                    <a href="{{ route('category.products', ['id' => $child->id, 'title' => $child->name]) }}">
                                                                        {{ $child->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('products') }}">Product</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('blogs') }}">BLog</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('about') }}">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('contact-us') }}">Contact</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <div class="navbar-btn d-flex">
                                <ul>
                                    <li><a href="{{ route('login') }}"><i class="ti-user"></i> Login</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div> <!-- navigation -->
                </div>
            </div>
        </div>
    </div>
</header>

<!--====== HEADER PART ENDS ======-->
