@extends('frontend.layouts.app')
@section('meta_title','Register')
@section('meta_description','Register')
@section('content')
    @include('frontend.includes.other-header')
     <!-- Page content -->
    <div class="container">
        <div class="row pt-80 pb-80">
            <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
                <div class="profile__wrapper white-bg">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 profile-data">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('storage/frontend/assets/img/staff.jpeg') }}" class="rounded-circle">
                                </a>
                            </div>
                            <a href="">
                                <div class="edit-img">
                                    <i class="fas fa-pen"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ Auth::user()->name }}
                        </h3>
                        <a href="#">Edit Basic Info</a>
                        <hr />
                    </div>
                    <div class="info">
                        @php
                            $splitName = explode(' ',Auth::user()->name, 2);
                        @endphp
                        <div class="pt-2">
                            <h4>First Name</h4>
                            <p>{{  $splitName[0] }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Last Name</h4>
                            <p>{{ !empty($splitName[1]) ? $splitName[1] : '' }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Contact number</h4>
                            <p>+91 {{ Auth::user()->mobile }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Email Address</h4>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Date of Birth</h4>
                            <p>{{ \Carbon\Carbon::parse(Auth::user()->customer->dob)->format('d-m-Y') }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Gender</h4>
                            <p>{{ Auth::user()->customer->gender }}</p>
                        </div>
                        <hr />
                    </div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="logout text-center">
                        <h3>
                            Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </h3>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-8 order-xl-2">
                <div class="profile__wrapper white-bg">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Update</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" value="{{ Str::random(7) }}" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" {{ Auth::user()->email }} id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First name</label>
                                            <input type="text" value="{{  $splitName[0] }}" name="first_name" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last name</label>
                                            <input type="text" value="{{ !empty($splitName[1]) ? $splitName[1] : '' }}"  name="last_name" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" value="{{ Auth::user()->customer->address }}" name="address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city" value="{{ Auth::user()->customer->city }}" name="city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-state">State</label>
                                            <input type="text" id="input-state" value="{{ Auth::user()->customer->state }}" name="state" class="form-control form-control-alternative" placeholder="City" value="New York">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country" value="{{ Auth::user()->customer->country }}"" name="country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal code</label>
                                            <input type="number" id="input-postal-code" value="{{ Auth::user()->customer->pincode }}" name="pin_code" class="form-control form-control-alternative" placeholder="Postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="">
                                <div class="form-group focused">
                                    <label>About Me</label>
                                    <textarea rows="4" class="form-control form-control-alternative" name="about_me" placeholder="A few words about you ...">{{ Auth::user()->customer->about_me }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
