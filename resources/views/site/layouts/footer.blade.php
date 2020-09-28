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
            <div class="col-lg-3 col-md-6 col-sm-6 order-4 order-lg-2">
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

            <div class="col-lg-5 col-md-6 col-sm-7 order-2 order-lg-4">
                <div class="footer-widget footer-download mt-30">

                    <ul>


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
                        <p>All copyright © reserved by volcano</p>
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
