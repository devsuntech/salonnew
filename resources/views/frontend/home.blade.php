@extends('frontend.layouts.app')
@section('meta_title','Welcome To ')
@section('content')

    <!-- /. preloader -->

    <div class="hero-area" style="background-image: linear-gradient(88deg, #000, transparent),url({{ asset('storage/frontend/assets/img/heroimg.jpeg') }});">
        @include('frontend.includes.home-header')
        <!-- slide-bar start -->
        <div class="fix">
            <div class="side-info d-lg-none">
                <button class="side-info-close"><i class="fal fa-times"></i></button>

                <div class="side__logo mb-25">
                    <a href="{{route('home')}}"><img src="{{ asset('/storage/frontend/assets/img/SalonNme-01.png.png') }}" alt="logo" /></a>
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
        <div class=" f-header-space fix pt-232 pb-155  pt-md-100 pb-md-100 pt-xs-100 pb-md-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-text mb-50">
                            <h3 class="title">Get</h3>
                            <h3 class="title">Discovered</h3>
                            <h4 class="animated-title">
                                With
                                <span>
                                    Salon N me
                                    <svg xmlns="http://www.w3.org/2000/svg" width="316px" height="32px">
                                        <path fill-rule="evenodd" stroke="rgb(67, 130, 79)" stroke-width="4px"
                                            stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                                            d="M2.000,24.000 C2.000,24.000 225.929,-3.528 350.000,3.000 " />
                                    </svg>
                                </span>
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="filter-area filter-padding mb-23">
                                    <form action="{{route('search.salon')}}">
                                        <div class="filter-form-wrap">
                                            <div class="form-left">
                                                <div class="input-wrap wrap-custom">
                                                    <div class="wrap-inner">
                                                        <label for="keyword">Discovered Near Me <i
                                                                class="far fa-angle-down"></i></label>
                                                        <input type="text" name="keyword" id="keyword" placeholder="Search for Salon or Service">
                                                    </div>
                                                </div>
                                                <div class="input-wrap wrap-custom">
                                                    <div class="wrap-inner has-wrap-padding">
                                                        <label for="location">Location <i
                                                                class="far fa-angle-down"></i></label>
                                                        <input type="text" name="location" id="location" placeholder="Andheri, Mumbai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-right">
                                                <div class="input-submit">
                                                    <i class="fal fa-location icon"></i>
                                                    <button type="submit" class="submit-btn">
                                                        Search Now <i class="far fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="hero-thumb-2">
            <img src="https://images.unsplash.com/photo-1564277287253-934c868e54ea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="thumb-1">
        </div> -->
        </div>
    </div>
    <main>
        <div class="categories-area pt-80 pb-40">
            <div class="container">
                <div class="slider row g-3 g-sm-6 text-center">
                     @foreach (App\Models\Category::orderBy('position')->get() as $category)
                    <div class="col-6 col-lg-4 col-lg-2 col-xl-2 ">
                        <!--== Start Product Category Item ==-->
                        <a href="{{ route('listing.page.category',$category->slug) }}" class="product-category-item " data-bg-color="{{ $category->bg_color }}" style="background-color:{{ $category->bg_color }}; ">
                            <img class="icon " src="{{ asset('storage/'.$category->icon) }}" width="80 " height="80 " alt="{{ $category->name }}">
                            <h3 class="title ">{{ $category->name }}</h3>
                        </a>
                        <!--== End Product Category Item ==-->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- PERCENT TOP DISCOUNT SECTION  START      -->
        <div class="review-area pt-100 pb-70 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title-4 title-light mb-60">
                            <span class="sub-title">Top Picks For you!!</span>
                            <h3 class="title">Top Discounts</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($top_discount_coupons as $key=>$coupon)
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="review-place mb-30 discount-sec">
                            <a href="{{ route('top_discount.vendors',$coupon->slug) }}" >
                            <div class="thumb">
                                 <img src="{{ asset('storage/'.$coupon->thumbnail) }}" width="870" alt="image"> 
                            </div>
                            </a>
                            <div class="content">
                                <h3 class="discount">
                                    {{$coupon->discount}}% OFF
                                </h3>
                                <h5 class="title"><a href="{{ route('top_discount.vendors',$coupon->slug) }}">{{ $coupon->title }}</a></h5>
                                <p>Coupon: {{ $coupon->coupon_code }}</p>
                                <div class="buttons">
                                    <a href="{{ route('top_discount.vendors',$coupon->slug) }}" class="wishlist-btn"><i class="fal fa-copy"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- PERCENT TOP DISCOUNT SECTION END     -->


        <!-- OFFER SECTION START -->
        <div class="featured-area pt-80 pb-70">
            <div class="container">
                <div class="row">
                    @foreach($featured_salons as $key=>$vendor)
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="offer-sec mb-30 discount-sec">
                            <a href="{{ route('vendor.detail',$vendor->slug) }}">
                            <div class="thumb">
                                <img src="{{ asset('storage/'.$vendor->feature_image) }}" alt="image">
                            </div>
                            </a>
                            <div class="content">
                                <h5 class="title"><a href="{{ route('vendor.detail',$vendor->slug) }}">{{$vendor->firm_name}}</a></h5>
                                <div class="know-buttons">
                                    <a href="{{ route('vendor.detail',$vendor->slug) }}">Know More <i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="featured-label">
                                <h4>{{$vendor->firm_name}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- TOP RATED SECTION START -->
        <div class="featured-area pt-80 pb-70">
            <div class="container">
                <div class="row mb-45">
                    <div class="col-xl-12 text-center">
                        <div class="section-title">
                            <h5 class="sub-title">Featured</h5>
                            <h3 class="animated-title">
                                Top Rated
                                <span>
                                    Places
                                    <svg xmlns="http://www.w3.org/2000/svg" width="192px" height="22px">
                                        <path fill-rule="evenodd" stroke="rgb(67, 130, 79)" stroke-width="4px"
                                            stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                                            d="M2.000,14.000 C2.000,14.000 101.929,-2.529 188.000,4.000 " />
                                    </svg>
                                </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    @foreach($all_review_salons as $key=>$vendor)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="featured-wrap mb-30">
                                <div class="thumb">
                                    <img src="{{ asset('storage/'.$vendor->feature_image) }}" alt="{{$vendor->firm_name}}">
                                </div>
                                <div class="content f-content">
                                    <div class="icon">
                                        <img src="{{ asset('storage/frontend/assets/img/hair-comb.png')}}">
                                    </div>
                                    <!--<div class="rating">-->
                                    <!--    <i class="fas fa-star"></i>-->
                                    <!--    <i class="fas fa-star"></i>-->
                                    <!--    <i class="fas fa-star"></i>-->
                                    <!--    <i class="fas fa-star"></i>-->
                                    <!--    <i class="far fa-star"></i>-->
                                    <!--</div>-->
                                    <h4 class="title f-title">
                                        <a href="{{ route('vendor.detail',$vendor->slug) }}">{{$vendor->firm_name}}</a>
                                    </h4>
                                    <div class="extra-info f-extra-info">
                                        <div class="know-buttons">
                                            <a href="{{ route('vendor.detail',$vendor->slug) }}">Know More <i class="far fa-arrow-right"></i></a>
                                        </div>
                                        <!--<span><i class="fal fa-map-marker-alt"></i> Andheri East</span>-->
                                        <!--<a href="{{ route('vendor.detail',$vendor->slug) }}" class="wishlist"><i class="fal fa-heart"></i></a>-->
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        </div>
        <!-- TOP RATED SECTION END -->




        <!-- OFFER SECTION END -->

        <div class="cta-area pt-140 pb-140" style="background-image: url(https://images.unsplash.com/photo-1595944024804-733665a112db?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80)" data-overlay="dark" data-opacity="6">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-title cta-text">
                            <h5 class="sub-title">
                                Best In India
                            </h5>
                            <h3 class="animated-title aniamted-title-2">
                                Visit The Best Salon
                                <span>
                                    and Treat yourself
                                    <svg xmlns="http://www.w3.org/2000/svg" width="334px" height="33px">
                                        <path fill-rule="evenodd" stroke="rgb(67, 130, 79)" stroke-width="4px"
                                            stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                                            d="M2.000,25.000 C2.000,25.000 243.929,-3.529 330.000,3.000 " />
                                    </svg>
                                </span>
                            </h3>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page
                            </p>
                            <a href="listings-grid-right-sidebar.html" class="a-btn a-btn-space mt-40">
                                Check Salons
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cta-thumb">
                <img class="jump-animation" src="{{ asset('storage/frontend/assets/img/sal12.jpg')}}" alt="thumb">
            </div>
        </div>




        <div class="work-area pt-95 pb-70 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title-2 mb-40">
                            <span class="sub-title">Process</span>
                            <h3 class="title"> How It Works </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="work-wrap-2 f-work-wrap-2 mb-30">
                            <div class="num">01</div>
                            <div class="title-wrap  f-title-wrap">
                                <div class="icon">
                                    <img src="{{ asset('storage/frontend/assets/img/lotion.png') }}">
                                </div>
                                <h4 class="title">Choose Your Category</h4>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmo d tempor incididunt ut labore.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="work-wrap-2 f-work-wrap-2 mb-30" style="background: #dcffd2;">
                            <div class="num">02</div>
                            <div class="title-wrap  f-title-wrap">
                                <div class="icon">
                                    <img src="{{ asset('storage/frontend/assets/img/find-my-friend.png') }}">
                                </div>
                                <h4 class="title">Find What You Want</h4>
                            </div>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="work-wrap-2 f-work-wrap-2 mb-30" style="background: rgb(249 193 182);">
                            <div class="num">03</div>
                            <div class="title-wrap  f-title-wrap">
                                <div class="icon">
                                    <img src="{{ asset('storage/frontend/assets/img/hair-comb.png') }}">
                                </div>
                                <h4 class="title">Go Our &amp; Explore</h4>
                            </div>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="newsletter-area pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-xl-end">
                    <div class="col-xl-6 col-lg-10">
                        <div class="section-title newsletter-content">
                            <h5 class="sub-title">Subscribe</h5>
                            <h3 class="animated-title">
                                Get Every Monthly
                                <span>
                                    Newsletter
                                    <svg xmlns="http://www.w3.org/2000/svg" width="303px" height="33px">
                                        <path fill-rule="evenodd" stroke="rgb(67, 130, 79)" stroke-width="4px"
                                            stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                                            d="M2.000,25.000 C2.000,25.000 212.929,-3.528 299.000,3.000 " />
                                    </svg>
                                </span>
                            </h3>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page
                            </p>
                        </div>
                        <div class="newsletter-form mt-40">
                            <form action="#">
                                <div class="input-wrap">
                                    <input type="text" placeholder="Enter email address">
                                    <button><i class="far fa-envelope"></i> Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="newsletter-video">
                <img src="{{ asset('/storage/frontend/assets/img/sal13.jpg') }}">
                <a href="https://www.youtube.com/watch?v=p_3ZjiZMtN4" class="play-btn popup-video"><i
                        class="fas fa-play"></i></a>
            </div>
        </div>


        <div class="news-area pt-100 pb-70">
            <div class="container">
                <div class="row mb-35">
                    <div class="col-xl-12">
                        <div class="section-title-2 text-center">
                            <span class="sub-title">News</span>
                            <h3 class="title">News Insights</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach(App\Models\Blog::latest()->take(3)->get() as $key=>$blog)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-wrap wrap-2 mb-30">
                            <div class="thumb">
                                <img src="{{ asset('storage/'.$blog->image) }}" alt="image">
                            </div>
                            <div class="content">
                                <div class="cat">
                                    <a href="#">Spa</a>,<a href="">Unisex</a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="#">{{$blog->title}}</a>
                                    </h3>
                                </div>
                                <div class="meta">
                                    <span>February, 2021</span>
                                    <span>By <a href="#">{{$blog->author}}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </main>
@endsection



