@extends('frontend.layouts.app')
@section('meta_title',$page->meta_title)
@section('meta_description',$page->meta_description)
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
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li><a href="{{route('about.us')}}">About</a></li>
                        <li class="has-dropdown"><a href="{{route('listing.page.category', 'salon')}}">Salons</a>
                        </li>
                        <li class="has-dropdown"><a href="{{route('news.feeds')}}">Blogs</a>
                        </li>
                        <li><a href="{{route('contact.us')}}">Contact</a></li>
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
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <p>
                   {!! html_entity_decode($page->description) !!}
                  
               </p>
           </div> 
        </div>
    </div>
@endsection