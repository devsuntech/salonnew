    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->
    <footer class="footer-area footer-1">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-xl-3 col-md-12">
                    <div class="footer-widget f-w-space widget-spacing about-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset('storage/frontend/assets/img/SalonNme-01.png.png') }}" alt="logo">
                            </a>
                        </div>
                        <p>
                            Our Company is working to bring some of the most offline industries into the digital age. By responding to a client need for a digital booking,we have provided business with dramatic benefits.
                        </p>
                        <div class="social-logo">
                            <a href="{{ App\Models\Setting::find(1)->facebook ?? 'https://facebook.com' }}"  target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->facebook ?? 'https://twitter.com' }}"  target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->facebook ?? 'https://instagram.com' }}"  target="_blank" class="behance"><i class="fab fa-instagram"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->facebook ?? 'https://youtube.com' }}"  target="_blank" class="youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="footer-widget-wrap position-relative">
                        <div class="row no-gutters">
                            <div class="col-xl-6 col-md-6">
                                <div class="footer-widget widget-spacing menu-widget">
                                    <h3 class="widget-title widget-title-1 border-0 mb-0">
                                        About <span>Us</span>
                                    </h3>
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        {{-- <li><a href="{{ route('about.us') }}">About</a></li> --}}
                                        <li><a href="{{ route('our.services') }}">Services</a></li>
                                        {{-- <li><a href="{{ route('portfolio') }}">Portfolio</a></li> --}}
                                        {{-- <li><a href="">Features</a></li> --}}
                                        <li><a href="{{ route('contact.us') }}">Contact</a></li>
                                        {{-- <li><a href="{{ route('news.feeds') }}">News</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="footer-widget widget-spacing menu-widget-2">
                                    <h3 class="widget-title border-0 mb-0">
                                        Quick <span>Links</span>
                                    </h3>
                                    <ul>
                                        <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                                        <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                                        {{-- <li><a href="{{ route('news.feeds') }}">News Feeds</a></li> --}}
                                        <li><a href="{{ route('faq.updates') }}">Faq & Updates</a></li>
                                        <li><a href="{{ route('refund.policy') }}">Refund Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-copyright d-none d-xl-block">
                            <p>Copyright ©2021 <a href="#">SalonNme</a>. All Reserved.</p>
                            <p> Designed By <a href="https://rohido.com/">Rohido Media</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="footer-widget f-w-space widget-spacing contact-widget pb-200 pb-xl-0">
                        <h3 class="widget-title border-0  widget-title-1 mb-0" style="color:white;">
                            Contact <span style="color: black;">Us</span>
                        </h3>
                        <form method="POST" action="{{ route('submit.contact') }}">
                            @csrf
                            <div class="input-wrap">
                                <input type="text" name="name" placeholder="Enter full name">
                            </div>
                            <div class="input-wrap">
                                <input type="text" name="email" placeholder="Enter email address">
                            </div>
                            <div class="input-wrap">
                                <textarea name="comment" placeholder="Enter message"></textarea>
                            </div>
                            <div class="input-wrap">
                                <input type="submit" class="submit-btn" value="Submit Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row no-gutters d-block d-xl-none">
                <div class="col-xl-12">
                    <div class="footer-copyright">
                        <p>Copyright ©2021 <a href="#">SalonNme</a>. All Reserved.</p>
                        <p> Designed By <a href="https://rohido.com/">Rohido Media</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
