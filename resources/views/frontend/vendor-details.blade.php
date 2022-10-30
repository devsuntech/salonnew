@extends('frontend.layouts.app')
@section('meta_title', $vendor->firm_name)
@section('meta_description', $vendor->firm_name)
@section('content')
    @include('frontend.includes.other-header')
    <style>
        .servicedetails {
            margin: 20px;
        }
    </style>
    <div class="clearfix"></div>
    <main class="pt-100">
        <div class="listing-details-area pb-100">
            @if (App\Models\VendorGallery::whereVendorId($vendor->id)->latest()->count())
                <div class="news-slider">
                    @foreach (App\Models\VendorGallery::whereVendorId($vendor->id)->latest()->get() as $key => $gallery)
                        <div class="news-thumb">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $vendor->firm_name . $gallery->id }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="news-slider">
                    <img src="/public/placeholdersalon.png" alt="1">
                    <img src="/public/placeholdersalon.png" alt="2">
                    <img src="/public/placeholdersalon.png" alt="3">
                </div>
            @endif
            <div class="news-content">
                <div class="container">
                    <div class="author-box-main mb-60">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6">
                                <div class="news-left mb-20 mb-lg-0">
                                    <div class="author-box d-sm-flex align-items-center">
                                        <div class="thumb radius-img-50 mb-30 mb-sm-0">
                                            <img src="assets/img/author/author-2.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h4 class="author-name"><a href="news.html">{{ $vendor->firm_name ?? '' }}<i
                                                        class="fal fa-check-circle"></i></a> </h4>
                                            <div class="author-meta d-md-flex">
                                                <div class="rating-2 mr-13  mb-10 mb-sm-0">
                                                    <span>4.8</span>
                                                    <i class="fas fa-star icon-default"></i>
                                                    <i class="fas fa-star icon-default"></i>
                                                    <i class="fas fa-star icon-default"></i>
                                                    <i class="fas fa-star icon-default"></i>
                                                    <i class="fal fa-star icon-default"></i>
                                                </div>
                                                <div class="duration d-inline-block">
                                                    {{-- <i class="fal fa-clock icon-default"></i><span> Posted 8 hours
                                                        ago</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div
                                    class="news-right d-flex align-items-sm-center justify-content-lg-end flex-column flex-sm-row">
                                    <div class="content-wrap d-sm-flex align-items-center">
                                        <div class="content-1 n-content-1 pr-40 mb-15 mb-sm-0">
                                            <div class="news-tag">
                                                <span><i class="fal fa-tags icon-default"></i> <a
                                                        href="listing-details.html">Salon</a>, <a
                                                        href="listing-details.html">Spa</a></span>
                                            </div>
                                            <div class="price">
                                                <i class="fas  fa-rupee-sign  icon-default" style="margin: 4px;"></i> <span>
                                                    ₹100 - ₹5k</span>
                                            </div>
                                        </div>
                                        <div class="content-2 f-left">
                                            <div class="news-action flex-md-column">
                                                {{-- <a href="listing-details.html" class="f-sm-btn"><i
                                                        class="fal fa-heart"></i></a> --}}
                                                <a class="f-sm-btn" onclick="copytoClipboard(window.location.href)"
                                                    style="color: white;"><i class="fal fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="news-action listing-action ml-60 mt-20 mt-sm-0">
                                        <a href="listings-grid-right-sidebar.html" class="f-btn f-custom-btn"><i
                                                class="fal fa-bars"></i> Show All Photos</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-description">
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                {{-- <div class="desc-box  mb-16">
                                    <p><span class="first-letter">S</span> Silver Rose Hotel at Novia offers fully furnished
                                        apartments to fit the needs of our pure guests visiting the <a
                                            href="contact.html">New York Metro</a> Area and is conveniently located
                                        in the vibrant community of Hoboken.</p>
                                </div>
                                <p>Novia's spaciously two bedroom apartments are perfect for families and even business
                                    partners. Look out into the Manhattan skyline from the open fully equipped kitchen.
                                    These two bedroom apartments are a perfect example
                                    of unparalleled ambiance offering spectacular views. Decorated to Dharma Home Suites
                                    feng shui style, you can relax at their accommodation peacefully and privately.</p> --}}
                                {{-- <hr class="mt-47 mb-45"> --}}
                                {{-- <div class="info">
                                    <h5>The space</h5>
                                    It’s quite obvious that Novia was built with the intention to please. For those who are
                                    fitness fanatics, there is an on-site Real Hot Yoga studio. There is a rooftop terrace
                                    on the 7th floor that offers spectacular views of Hoboken. Arriving later than
                                    planned? Don’t fret, there’s a 24-hour check-in available for your convenience.
                                    <hr class="mt-47 mb-45">
                                    <div class="service-wrapper">
                                        <div class="single-service">
                                            <div class="service-icon f-left"><i class="fal fa-home-lg-alt"></i></div>
                                            <div class="service-desc fix">
                                                <h5><a href="listing-details.html">Entire home</a></h5>
                                                <p>There is a rooftop terrace on the 7th floor that offers<br> spectacular
                                                    views of Hoboken.</p>
                                            </div>
                                        </div>
                                        <div class="single-service">
                                            <div class="service-icon f-left"><i class="fal fa-paint-roller"></i></div>
                                            <div class="service-desc fix">
                                                <h5><a href="listing-details.html">Enhanced Clean</a></h5>
                                                <p>This host committed to Airbnb's 5-step enhanced cleaning process. <a
                                                        href="listing-details.html">Learn more</a></p>
                                            </div>
                                        </div>
                                        <div class="single-service">
                                            <div class="service-icon f-left"><i class="fal fa-paint-roller"></i></div>
                                            <div class="service-desc fix">
                                                <h5><a href="listing-details.html">Cancellation policy</a></h5>
                                                <p>Cancel before 3:00 PM on Dec 1 and get a 50% refund, minus the first
                                                    night and<br> service fee. Get details</p>
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}



                                <hr class="mt-45 mb-45">
                                @if ($vendor->amenities != '')
                                    <div class="service-cat-list">
                                        <h5>Amenities</h5>
                                        <br />
                                        <ul class="pr-35">
                                            @foreach (json_decode($vendor->amenities) as $value)
                                                <li>
                                                    <a style="margin-right: 53px !important;"><i
                                                            class="fal fa-check-circle"></i>{{ $value }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <hr class="mt-20 mb-45">
                                @endif

                                {{-- <hr class="mt-20 mb-45"> --}}
                                <div class="services-tabs" style="margin: 20px">
                                    <div class="service-sec">
                                        <h5>
                                            Services


                                        </h5>
                                        {{-- @php
                                           dd($vendorDetails);
                                        @endphp --}}
                                        <div class="tab">
                                            @foreach ($vendorDetails as $key => $vendorvalue)
                                                <button class="tablinks"
                                                    onclick="openCity(event, 'serv{{ $key }}')"
                                                    id="defaultOpen">{{ $vendorvalue[0]->vendorservicedetails->name }}</button>
                                            @endforeach

                                        </div>
                                        <div>
                                            @foreach ($vendorDetails as $key => $vendorsubservice)
                                                <div id="serv{{ $key }}" class="tabcontent ">
                                                    @foreach ($vendorsubservice as $value)
                                                        <div class="serv">
                                                            <div class="left-serv">
                                                                @php
                                                                    // dd($value->vendorsubservicedetails);
                                                                @endphp
                                                                <h5> {{ $value->vendorsubservicedetails->name }} </h5>
                                                                <span class="serivce-time">{{ $value->minimum_time }} -
                                                                    {{ $value->maximum_time }}</span>
                                                            </div>
                                                            <div class="right-serv" style="display: flex">
                                                                <h5>₹{{ $value->price }}</h5>
                                                                <input type="checkbox" name="selectedsubservice"
                                                                    value='{"price":"{{ $value->price }}","subserviceid":"{{ $value->subservice_id }}","subservicename":"{{ $value->vendorsubservicedetails->name }}","subserviceminute":"{{ $value->minimum_time }}","vendorserviceid":"{{ $value->id }}"}' />
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            {{-- <button class="btn btn-primary btn-sm" style="float: right;">Submit</button> --}}
                                        </div>
                                        <div>
                                            <div class="servicedetails">
                                                <select class="form-control" id="staffselect">
                                                    <option value="0">No Alternative</option>
                                                    @foreach ($staff as $staffsingle)
                                                        <option value="{{ $staffsingle->id }}">{{ $staffsingle->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="servicedetails">
                                                <input type="date" id="appointmentdate" name="appointmentime"
                                                    class="form-control"
                                                    value="{{ Carbon\Carbon::now()->setTimezone('Asia/Kolkata')->format('Y-m-d') }}"
                                                    min="{{ Carbon\Carbon::now()->setTimezone('Asia/Kolkata')->format('Y-m-d') }}">
                                            </div>
                                            <div class="servicedetails">
                                                <select class="form-control" id="slotselection">
                                                    <option>Select Slot</option>
                                                    @foreach ($slots as $key => $slot)
                                                        <option value="{{ $slotsValue[$key] }}">{{ $slot }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm"
                                        style="float: right;padding:10px 20px;background:#f9c1b6;border: #f9c1b6;"
                                        onclick="selectedform('{{ $vendor->id }}')">Book Now</button>
                                    <br>
                                </div>
                                <div class="bookwStaff">
                                    <h5>Our Staff</h5>
                                    <div class="row staff">
                                        @foreach (App\Models\VendorStaff::whereVendorId($vendor->id)->orderBy('name')->get() as $staff)
                                            <div class="col-lg-3 Staff text-center">
                                                <a>
                                                    <div class=" staff-img ">
                                                        <img src="{{ asset('storage/' . $staff->profile_pic) }}">
                                                    </div>
                                                    <h5>{{ Str::words($staff->name, 1) }}</h5>
                                                    @php
                                                        $staff_services = App\Models\Service::whereIn('id', json_decode($staff->services))
                                                            ->pluck('name')
                                                            ->toArray();
                                                    @endphp
                                                    <span>{{ implode(', ', $staff_services) }}</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>



                                <hr class="mt-20 mb-45 ">
                                {{-- <div class="review-box pb-36 ">
                                    <h5 class="has-border mb-40 ">User Reviews</h5>
                                    <div class="review-list ">
                                        <div class="single-review fix pb-32 mb-40 ">
                                            <div class="review-thumb f-review-thumb f-left mr-40 ">
                                                <img src="assets/img/user-1.png " alt=" ">
                                            </div>
                                            <div class="review-content fix mt-11 ">
                                                <div class="content-top ">
                                                    <h5><a href="news.html ">Rosalina D. William</a></h5>
                                                    <p>It was popularised in the sheets containing lorem ipsum is simply
                                                        free text.<br>It has survived not only five centuries, but also the
                                                        leap. </p>
                                                    <hr>
                                                </div>
                                                <div class="content-bottom ">
                                                    <div class="review-rating-wrapper d-inline-block mr-45 ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Rating</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Services</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-rating-wrapper d-inline-block ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Hospitality</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Pricing</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-review fix pb-32 mb-40 ">
                                            <div class="review-thumb f-review-thumb f-left mr-40 ">
                                                <img src="assets/img/user-2.png " alt=" ">
                                            </div>
                                            <div class="review-content fix mt-11 ">
                                                <div class="content-top ">
                                                    <h5><a href="news.html ">Rosalina D. William</a></h5>
                                                    <p>It was popularised in the sheets containing lorem ipsum is simply
                                                        free text.<br>It has survived not only five centuries, but also the
                                                        leap. </p>
                                                    <hr>
                                                </div>
                                                <div class="content-bottom ">
                                                    <div class="review-rating-wrapper d-inline-block mr-45 ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Rating</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Services</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-rating-wrapper d-inline-block ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Hospitality</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Pricing</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-review fix border-0 ">
                                            <div class="review-thumb f-review-thumb f-left mr-40 ">
                                                <img src="assets/img/user-3.png " alt=" ">
                                            </div>
                                            <div class="review-content fix mt-11 ">
                                                <div class="content-top ">
                                                    <h5><a href="news.html ">Rosalina D. William</a></h5>
                                                    <p>It was popularised in the sheets containing lorem ipsum is simply
                                                        free text.<br>It has survived not only five centuries, but also the
                                                        leap. </p>
                                                    <hr>
                                                </div>
                                                <div class="content-bottom ">
                                                    <div class="review-rating-wrapper d-inline-block mr-45 ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Rating</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Services</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-rating-wrapper d-inline-block ">
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Hospitality</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                        <div class="single-rating mb-5-px ">
                                                            <div class="rating rating-3 ">
                                                                <span>Pricing</span>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fas fa-star icon-default "></i>
                                                                <i class="fal fa-star icon-default "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-form ">
                                    <h5 class="has-border mb-27 ">Write a Review</h5>
                                    <form action="# ">
                                        <div class="content-bottom pb-43 ">
                                            <div class="review-rating-wrapper d-inline-block mr-45 ">
                                                <div class="single-rating mb-5-px ">
                                                    <div class="rating rating-3 ">
                                                        <span>Rating</span>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fal fa-star icon-default "></i>
                                                    </div>
                                                </div>
                                                <div class="single-rating mb-5-px ">
                                                    <div class="rating rating-3 ">
                                                        <span>Services</span>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fal fa-star icon-default "></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-rating-wrapper d-inline-block ">
                                                <div class="single-rating mb-5-px ">
                                                    <div class="rating rating-3 ">
                                                        <span>Hospitality</span>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fal fa-star icon-default "></i>
                                                    </div>
                                                </div>
                                                <div class="single-rating mb-5-px ">
                                                    <div class="rating rating-3 ">
                                                        <span>Pricing</span>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fas fa-star icon-default "></i>
                                                        <i class="fal fa-star icon-default "></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-main mb-50 mb-lg-0 ">
                                            <div class="row custom-row-2 ">
                                                <div class="col-xl-6 custom-col-2 ">
                                                    <div class="input-group mb-20 ">
                                                        <input type="text " placeholder="Title of your Review "
                                                            name="rtitle " class="input-default ">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 custom-col-2 ">
                                                    <div class="input-group mb-20 ">
                                                        <input type="text " placeholder="Website name " name="wname "
                                                            class="input-default ">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 custom-col-2 ">
                                                    <div class="input-group mb-20 ">
                                                        <input type="text " placeholder="Enter full name "
                                                            name="fname " class="input-default ">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 custom-col-2 ">
                                                    <div class="input-group mb-20 ">
                                                        <input type="email " placeholder="Your email " name="fname "
                                                            class="input-default ">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 custom-col-2 ">
                                                    <div class="input-group mb-25 ">
                                                        <textarea name="message " class="textarea-default " id="message " cols="30 " rows="10 ">Enter message</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 custom-col-2 ">
                                                    <div class="form-group mb-20 ">
                                                        <div class="review-condition ">
                                                            <input type="checkbox " name="condition " id="condition ">
                                                            <label for="condition ">Save my name, email, and website in
                                                                this browser for the next time I comment.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 custom-col-2 ">
                                                    <button type="submit " class="btn-default ">Submit Now <i
                                                            class="fal fa-paper-plane "></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="col-xl-4 col-lg-5 ">
                                <div class="sidebar-wrapper ">
                                    <div class="single-widget widget-2 mb-30 ">
                                        <div class="widget-map ">
                                            <div class="map-frame pb-27 ">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.973772994998!2d90.76841531536743!3d24.137559179791687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375427f492d15383%3A0xa3260008152240ca!2sAkand%20Bari!5e0!3m2!1sen!2sbd!4v1618422028538!5m2!1sen!2sbd "
                                                    class="border-0 " allowfullscreen=" " loading="lazy "></iframe>
                                            </div>
                                            <div class="map-content pl-20 pr-20 ">
                                                <ul class="address-list ">
                                                    <li><i
                                                            class="fal fa-map-marker-alt "></i>{{ $vendor->firm_address ?? '' }}
                                                    </li>
                                                    {{-- <li><i class="fal fa-phone "></i>92 666 888 0000</li> --}}
                                                    {{-- <li><i class="fal fa-envelope "></i><a
                                                            href="/cdn-cgi/l/email-protection " class="__cf_email__ "
                                                            data-cfemail="07696262636f626b7747627f666a776b622964686a ">[email&#160;protected]</a>
                                                    </li> --}}
                                                    <li><i class="fal fa-globe "></i>{{ $vendor->user->email }}</li>
                                                </ul>
                                                <div class="widget-social ">
                                                    @if ($vendor->facebook)
                                                        <a href="{{ $vendor->facebook }}" class="facebook-btn "
                                                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    @endif
                                                    @if ($vendor->twitter)
                                                        <a href="{{ $vendor->twitter }}" class="twitter-btn "
                                                            target="_blank"><i class="fab fa-twitter"></i></a>
                                                    @endif
                                                    @if ($vendor->youtube)
                                                        <a href="{{ $vendor->youtube }}" class="youtube-btn "
                                                            target="_blank"><i class="fab fa-youtube"></i></a>
                                                    @endif
                                                    @if ($vendor->instagram)
                                                        <a href="{{ $vendor->instagram }}" class="instagram-btn"
                                                            style="background: black" target="_blank">
                                                            <i class="fab fa-instagram "></i></a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="single-widget widget-padding mb-30 ">
                                        <h4 class="widget-title "><span>//</span> Business Hours</h4>
                                        <ul class="duration-list ">
                                            <li>
                                                <span class="day-count ">Monday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Tuesday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Wednesday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Thursday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Friday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Saturday</span>
                                                <span class="duration-count ">10:00 - 22:00</span>
                                            </li>
                                            <li>
                                                <span class="day-count ">Sunday</span>
                                                <span class="off-day ">Off Day</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="single-widget d-inline-block d-lg-block ">
                                        <h4 class="widget-title mb-0 "><span>//</span> Sponsord Add</h4>
                                        <div class="sponsor-thumb ">
                                            <a href="listing-details.html ">
                                                <img src="assets/img/banner/banner-2.jpg " class="img-fluid "
                                                    alt=" ">
                                                <div class="sponsor-sm-thumb ">
                                                    <span>290x240</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
@section('style')

@endsection
@section('script')
    <script src="{{ asset('storage/frontend/assets/js/vertical-service-tab.js') }}"></script>
    <script>
        // console.log()
        $(function() {

            if (localStorage.getItem("data") !== "" && localStorage.getItem("data") !==null) {
                window.location.href = "/booking/spiky-salon";
            }
        })

        function movetoBookingpage(value) {
            window.location.href = value
        }

        function selectedform(id) {
            var staffid = $('#staffselect').val();
            var bookingDate = $('#appointmentdate').val();
            var slotselection = $('#slotselection').val();
            // var selectedids = $("input[name='selectedsubservice[]']:checked").val();
            var selectedids = [];
            var items = [];
            var total_amount = 0;
            $('[name="selectedsubservice"]').each(function() {
                // selectedids.push()

                let singleService = $(this).val()
                
                let singleServiceid = JSON.parse(singleService);
                // console.log(singleServiceid)
                selectedids.push(singleServiceid.vendorserviceid);
                total_amount += parseInt(singleServiceid.price); 
                items.push($(this).val());
            });
            var formData = {
                "vendor_staff_id": staffid,
                "date": bookingDate,
                "time": slotselection,
                "services":selectedids,
                "vendor_id": id,
                "items": items,
                "total_amount":total_amount
            }

            // console.log(formData)
            localStorage.setItem("data", "");
            localStorage.setItem("data", JSON.stringify(formData));

            window.location.replace('/booking/spiky-salon')

        }

        function copytoClipboard(value) {

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                try {
                    if (navigator.share) {
                        navigator.share({
                                title: document.title,
                                text: "Salon n Me",
                                url: window.location.href
                            })
                            .then(() => console.log('Successful share'))
                            .catch(error => console.log('Error sharing:', error));
                    }
                } catch (error) {

                }
            } else {
                // Copy the text inside the text field
                navigator.clipboard.writeText(value);
                // Alert the copied text
                alert("Copied the text: " + value);
            }



        }
    </script>
@endsection
