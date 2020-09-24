<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ setting('meta_description') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

    <!-- PAGE TITLE HERE -->
    <title> {{ setting('website_title') }} </title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site/images/favicon.ico') }}" />

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}">

    <!--====== themify css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/themify-icons.css') }}">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/nice-select.css') }}">

    <!--====== jquery ui css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/jquery-ui.min.css') }}">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/animate.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/slick.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">


@stack('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('google_analytics') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ setting('google_analytics') }}');
    </script>

</head>
<body>
    <!--===== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
    </div>

    <!--===== PRELOADER PART ENDS ======-->

    @include('site.layouts.header')

    @yield('content')

    @include('site.layouts.footer')

    <!--====== BACK TO TOP PART START ======-->

    <div class="back-to-top">
        <i class="ti-arrow-up"></i>
    </div>

    <!--====== BACK TO TOP PART ENDS ======-->


    <!--====== jquery js ======-->
    <script src="{{ asset('site/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('site/js/slick.min.js') }}"></script>

    <!--====== syotimer js ======-->
    <script src="{{ asset('site/js/jquery.syotimer.min.js') }}"></script>

    <!--====== jquery ui js ======-->
    <script src="{{ asset('site/js/jquery.ui.js') }}"></script>

    <!--====== magnific popup js ======-->
    <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== nice select js ======-->
    <script src="{{ asset('site/js/jquery.nice-select.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('site/js/ajax-contact.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('site/js/main.js') }}"></script>

@stack('scripts')

</body>
</html>
