@extends('frontend.layouts.app')
@section('meta_title','Salon Login')
@section('meta_description','Salon Login')
@section('content')
    @include('frontend.includes.other-header')
                <!-- slide-bar start -->
        <div class="fix">
            <div class="side-info d-lg-none">
                <button class="side-info-close"><i class="fal fa-times"></i></button>

                <div class="side__logo mb-25">
                    <a href="index.html"><img src="{{ asset('/storage/frontend/assets/img/SalonNme-01.png.png') }}" alt="logo" /></a>
                </div>

                <div class="d-inline-block sm-screen">
                            @auth
                            
                            @else
                            <div class="header-btn">
                                <a href="{{ route('vendor.login') }}">
                                    Salon Login <i class="far fa-plus"></i>
                                </a>
                            </div>
                            <div class="header-btn">
                                <a href="{{ route('customer.login') }}">
                                    Customer Login <i class="far fa-plus"></i>
                                </a>
                            </div>
                            @endif
                </div>
                <div class="mobile-menu"></div>

                <div class="contact-infos mt-30 mb-30">
                    <div class="contact-list mb-30">
                        <h4>Contact Info</h4>
                        <ul class="p-0">
                            <li><i class="fal fa-map"></i>12/A, Mirnada City Tower, NYC</li>
                            <li><i class="flaticon-phone-call"></i><a href="tell:+876864764764">+876 864 764 764</a>
                            </li>
                            <li><i class="flaticon-email-1"></i><a href="/cdn-cgi/l/email-protection#4d24232b220d3a282f202c2421632e2220"><span
                                        class="__cf_email__"
                                        data-cfemail="eb82858d84ab9c8e89868a8287c5888486">[email&#160;protected]</span></a>
                            </li>
                        </ul>

                        <div class="sidebar__menu--social">
                            <a href="{{ App\Models\Setting::find(1)->facebook ?? 'https://facebook.com' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->twitter ?? 'https://twitter.com' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->instagram ?? 'https://instagram.com' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->linkedin ?? 'https://linkedin.com' }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="{{ App\Models\Setting::find(1)->youtube ?? 'https://youtube.com' }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="side-info d-none d-lg-block text-center">
                <button class="side-info-close"><i class="fal fa-times"></i></button>

                <div class="side__logo mb-25">
                    <a href="index.html"><img src="{{ asset('/storage/frontend/assets/img/SalonNme-01.png.png') }}" alt="logo" /></a>
                </div>

                <div class="info-text mb-30">
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore</p>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="has-dropdown">
                            <a href="index.html">Home</a>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li class="has-dropdown"><a href="listings-grid-right-sidebar.html">Salons</a>
                        </li>
                        <li class="has-dropdown"><a href="news.html">Blogs</a>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <div class="row side-row">
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sal1.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sal1.jpg') }}"></a>
                    </div>
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sal2.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sal2.jpg') }}"></a>
                    </div>
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sal3.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sal3.jpg') }}"></a>
                    </div>
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sal4.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sal4.jpg') }}"></a>
                    </div>
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sal5.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sal5.jpg') }}"></a>
                    </div>
                    <div class="col-4 mb-15">
                        <a class="popup-image" href="{{ asset('storage/frontend/assets/img/sAL6.jpg') }}"><img alt="#" src="{{ asset('storage/frontend/assets/img/sAL6.jpg') }}"></a>
                    </div>
                </div>

                <!-- <div class="side-map mt-20 mb-30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
            </div> -->

                <div class="contact-infos mt-30 mb-30">
                    <div class="contact-list mb-30">
                        <div class="sidebar__menu--social">
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="offcanvas-overlay"></div>
        <!-- slide-bar end -->
    <main>
        <div class="breadcrumb-area" style="background-image: url(https://images.pexels.com/photos/705255/pexels-photo-705255.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" data-overlay="dark" data-opacity="7">
            <div class="container pt-150 pb-150 position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title">
                            <h3 class="title"> Salon Sign In</h3>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-nav">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Sign in</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- sign area start -->
        <div class="sign-up-area pb-100 pt-100 fix">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="sign__wrapper white-bg">
                         <div class="sign__header mb-35">
                            <!-- div class="sign__in sign-breadcrumb-inner">
                                <a href="#" class="sign__social text-start mb-15"><i class="fab fa-facebook-f"></i>Sign in with Facebook</a> 
                                <p> <span>........</span> Or, <a href="user-sign-in.html">sign in</a> with your email<span> ........</span> </p>
                            </div -->
                        </div> 
                        <div class="sign__header mb-35" style="">
                            @if (session('success'))
                                <h4><a class="text-success">{{ session('success') }}</a></h4>
                            @elseif (session('error'))
                                 <h4><a class="text-danger">{{ session('error') }}</a></h4>
                            @endif
                        </div>
                        <div class="sign__form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Mobile</h5>
                                    <div class="sign__input">
                                        <input type="text" name="mobile" placeholder="9024548779" maxlength="10">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    @error('mobile')
                                    <label class="messages text-danger">{{ $errors->first('mobile') }}</label>
                                    @enderror
                                </div>
                                <div class="sign__input-wrapper mb-10">
                                    <h5>Password</h5>
                                    <div class="sign__input">
                                        <input type="password" name="password" placeholder="Password" maxlength="16">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                    @error('password')
                                    <label class="messages text-danger">{{ $errors->first('password') }}</label>
                                    @enderror
                                </div>
                                <div class="sign__action d-sm-flex justify-content-between mb-30">
                                    <div class="sign__agree d-flex align-items-center">
                                        <input class="m-check-input" type="checkbox" id="m-agree">
                                        <label class="m-check-label" for="m-agree">Keep me signed in</label>
                                    </div>
                                    <div class="sign__forgot">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <button type="submit" class="m-btn m-btn-4 w-100"> <span></span> Sign In</button>
                                <div class="sign__new text-center mt-20">
                                    <p>New to Salon N me? <a href="{{ route('vendor.register') }}">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sign area end -->
    </main>
    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
@endsection
