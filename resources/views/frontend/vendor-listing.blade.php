@extends('frontend.layouts.app')
@section('meta_title','Listing')
@section('meta_description','Listing')
@section('content')
    @include('frontend.includes.other-header')
    <main>
        <!-- map-listing area start -->
        <div class="map-listing-area-2 p-rel pt-75 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="m-c-padding">
                        </div>
                        <div class="top-heading">
                            <h3>Found {{$vendors->total()}}+ Results for Salon in your city</h3>
                        </div>
                        <div class="search-result">
                            <div class="d-flex search-flex justify-content-between mb-30">
                                <div class="search-result-top  d-flex align-items-center">
                                    <nav>
                                        <div class="nav custom-tab" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-th-large"></i></a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-th-list"></i></a>
                                        </div>
                                    </nav>

                                </div>
                                <div class="selectinput ">
                                    <select>
                                        <option value="0">Default Select :</option>
                                        <option value="1">Nearest</option>
                                        <option value="2">Top Rated</option>
                                        <option value="3">Lowest Price</option>
                                        <option value="3">Recomendend</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /. search result top -->
                            <div class="search-result-bottom">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel">
                                        <div class="row custom-row pb-10">
                                            @foreach ($vendors as $key=>$vendor)
                                            <div class="col-xl-4 col-md-6 custom-col">
                                                <div class="featured-wrap-3 mb-30 style-2 mb-30">
                                                    <a href="{{ route('vendor.detail',$vendor->slug) }}">
                                                    <div class="thumb">
                                                        <img src="{{ $vendor->feature_image ?  asset('storage/'.$vendor->feature_image) : '/placeholdersalon.png' }}" alt="thumb" style="min-height: 363px">
                                                        <span class="rating  rating-2"><i class="fal fa-heart"></i>
                                                            4.8</span>
                                                    </div>
                                                    </a>
                                                    <div class="content content-update">
                                                        <div class="buttons btn-pos-2">
                                                            <a href="{{ route('vendor.detail',$vendor->slug) }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                        <div class="author-info author-info-2">
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail',$vendor->slug) }}">{{ $vendor->firm_name }} <i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>{!! Str::words($vendor->about_firm,10) !!}</p>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="extra-info extra-info-update">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone"></i> 92 666 888 0000</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row">

                                            <div class="col-xl-12">
                                                {{ $vendors->links('frontend.pagination') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel">
                                        <div class="row pb-10">
                                            <div class="col-xl-12">
                                                <div class="feature-list-2 d-sm-flex mb-30">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/frontend/assets/img/blog/list-img-1.jpg') }}" alt="thumb">
                                                        <span class="rating-2"><i class="fal fa-heart"></i> 4.8</span>
                                                    </div>
                                                    <div class="listing-content f-listing">
                                                        <div class="listing-btn pos-abs tb-center f-flex-column">
                                                            <a href="{{ route('vendor.detail','details') }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>

                                                        </div>
                                                        <div class="l-author-info l-flex has-border-bottom">
                                                            <div class="image-2">
                                                                <img src="{{ asset('storage/frontend/assets/img/author/author-1.jpg') }}" alt="author">
                                                            </div>
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail','details') }}">Silver Rose Store <i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>Lorem ipsum is dolor</p>
                                                            </div>
                                                        </div>
                                                        <div class="listing-info pb-0">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone-alt"></i> 92 666 888
                                                                0000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="feature-list-2  d-sm-flex mb-30">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/frontend/assets/img/blog/lis') }}t-img-2.jpg" alt="thumb">
                                                        <span class="rating-2"><i class="fal fa-heart"></i> 4.8</span>
                                                    </div>
                                                    <div class="listing-content f-listing">
                                                        <div class="listing-btn pos-abs tb-center f-flex-column">
                                                            <a href="{{ route('vendor.detail','details') }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>

                                                        </div>
                                                        <div class="l-author-info l-flex has-border-bottom">
                                                            <div class="image-2">
                                                                <img src="{{ asset('storage/frontend/assets/img/author2/') }}author-3.png" alt="author">
                                                            </div>
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail','details') }}">Alyssa Lynch <i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>Lorem ipsum is dolor</p>
                                                            </div>
                                                        </div>
                                                        <div class="listing-info pb-0">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone-alt"></i> 92 666 888
                                                                0000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="feature-list-2 d-sm-flex mb-30">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/frontend/assets/img/blog/lis') }}t-img-3.jpg" alt="thumb">
                                                        <span class="rating-2"><i class="fal fa-heart"></i> 4.8</span>
                                                    </div>
                                                    <div class="listing-content f-listing">
                                                        <div class="listing-btn pos-abs tb-center f-flex-column">
                                                            <a href="{{ route('vendor.detail','details') }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>

                                                        </div>
                                                        <div class="l-author-info l-flex has-border-bottom">
                                                            <div class="image-2">
                                                                <img src="{{ asset('storage/frontend/assets/img/author2/') }}author-4.png" alt="author">
                                                            </div>
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail','details') }}">Trevor Moody <i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>Lorem ipsum is dolor</p>
                                                            </div>
                                                        </div>
                                                        <div class="listing-info pb-0">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone-alt"></i> 92 666 888
                                                                0000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="feature-list-2 d-sm-flex mb-30">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/frontend/assets/img/blog/lis') }}t-img-4.jpg" alt="thumb">
                                                        <span class="rating-2"><i class="fal fa-heart"></i> 4.8</span>
                                                    </div>
                                                    <div class="listing-content f-listing">
                                                        <div class="listing-btn pos-abs tb-center f-flex-column">
                                                            <a href="{{ route('vendor.detail','details') }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>

                                                        </div>
                                                        <div class="l-author-info l-flex has-border-bottom">
                                                            <div class="image-2">
                                                                <img src="{{ asset('storage/frontend/assets/img/author2/') }}author1.png" alt="author">
                                                            </div>
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail','details') }}">Meredith Banks<i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>Lorem ipsum is dolor</p>
                                                            </div>
                                                        </div>
                                                        <div class="listing-info pb-0">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone-alt"></i> 92 666 888
                                                                0000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="feature-list-2 d-sm-flex mb-30">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/frontend/assets/img/blog/lis') }}t-img-5.jpg" alt="thumb">
                                                        <span class="rating-2"><i class="fal fa-heart"></i> 4.8</span>
                                                    </div>
                                                    <div class="listing-content f-listing">
                                                        <div class="listing-btn pos-abs tb-center f-flex-column">
                                                            <a href="{{ route('vendor.detail','details') }}" class="wishlist-btn"><i class="fal fa-heart"></i></a>

                                                        </div>
                                                        <div class="l-author-info l-flex has-border-bottom">
                                                            <div class="image-2">
                                                                <img src="{{ asset('storage/frontend/assets/img/author2.png') }}" alt="author">
                                                            </div>
                                                            <div class="text">
                                                                <h5>
                                                                    <a href="{{ route('vendor.detail','details') }}">Reginald Salazar"<i class="fal fa-check-circle"></i></a>
                                                                </h5>
                                                                <p>Lorem ipsum is dolor</p>
                                                            </div>
                                                        </div>
                                                        <div class="listing-info pb-0">
                                                            <span><i class="fal fa-map-marker-alt"></i> 80 Broklyn
                                                                Street USA</span>
                                                            <span><i class="fal fa-phone-alt"></i> 92 666 888
                                                                0000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="f-pagination">
                                                    <a href="#"><i class="fal fa-long-arrow-left"></i></a>
                                                    <a href="#">01</a>
                                                    <a href="#" class="active">02</a>
                                                    <a href="#">...</a>
                                                    <a href="#"><i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /. search result bottom -->
                        </div>
                        <!-- /. search-result -->
                    </div>
                </div>
            </div>
        </div>
        <!-- map-listing area end -->

        <!-- slide-bar end -->
        <!-- slide-bar end -->
        <!-- back to top start -->
        <div class="progress-wrap ">
            <svg class="progress-circle svg-content " width="100% " height="100% " viewBox="-1 -1 102 102 ">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98 " />
            </svg>
        </div>
    </main>
@endsection
