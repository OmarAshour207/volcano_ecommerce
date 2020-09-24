<!--====== FOOTER PART START ======-->

<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer-widget footer-about mt-30">
                    <h4 class="title">About us</h4>
                    <p>{{ $aboutUs->description }} </p>
                    <ul>
                        @php
                            $sites = ['facebook', 'twitter', 'instagram'];
                        @endphp
                        @for($i = 0; $i < count($sites);$i++)
                            <li>
                                <a href="{{ setting($sites[$i]) }}">
                                    <i class="fa fa-{{ $sites[$i] }}{{ $i == 0 ? '-f' : '' }}"></i>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 order-4 order-lg-2">
                <div class="footer-widget footer-list mt-30">
                    <h4 class="title">Custom Link</h4>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                        <li><a href="{{ url('contact-us') }}">Contact</a></li>
                        <li><a href="{{ url('blogs') }}">Blog</a></li>
                        <li><a href="{{ url('about') }}">About</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="{{ url('products') }}">Product</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6  order-3">
                <div class="footer-widget footer-list mt-30 ml-85">
                    <h4 class="title">Account Info</h4>
                    <ul>
                        <li><a href="#">Personal Info</a></li>
                        <li><a href="#">Signup</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Credit Slips</a></li>
                        <li><a href="#">Addresses</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">My account</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7 order-2 order-lg-4">
                <div class="footer-widget footer-download mt-30">
                    <h4 class="title">Download Our App</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ti-android"></i>
                                <span>get it on</span>
                                <p>Goole play</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti-apple"></i>
                                <span>get it on</span>
                                <p>App Store</p>
                            </a>
                        </li>
                    </ul>
                    <span>Store Location</span>
                    <p>{{ setting('en_address') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright-item d-block d-md-flex justify-content-between align-items-center">
                        <p>All copyright © reserved by Fuznet 2020</p>
                        <ul>
                            <li><a href="#"><img src="{{ asset('site/images/footer-pay-1.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('site/images/footer-pay-2.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('site/images/footer-pay-3.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== FOOTER PART ENDS ======-->
