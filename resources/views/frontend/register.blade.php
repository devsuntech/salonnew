@extends('frontend.layouts.app')
@section('meta_title', 'Register')
@section('meta_description', 'Register')
@section('content')
    @include('frontend.includes.other-header')
    <main>
        <div class="breadcrumb-area"
            style="background-image: url(https://images.pexels.com/photos/705255/pexels-photo-705255.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)"
            data-overlay="dark" data-opacity="7">
            <div class="container pt-150 pb-150 position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title">
                            <h3 class="title">User Sign Up</h3>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-nav">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Sign Up</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- sign area start -->
        <div class="sign-up-area pb-100 pt-100 fix">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-6">
                    <div class="sign__wrapper white-bg">
                        <div class="sign__form">
                            <form action="{{ route('user.register') }}" method="post" class="row">
                                @csrf
                                <div class="col-lg-6 sign__input-wrapper mb-25">
                                    <h5>First Name</h5>
                                    <div class="sign__input">
                                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                                            placeholder="First Name " required>
                                        <i class="fal fa-user-alt"></i>
                                    </div>
                                    @error('first_name')
                                        <label class="messages text-danger">{{ $errors->first('first_name') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Last Name</h5>
                                    <div class="sign__input">
                                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                                            placeholder="Last Name" required>
                                        <i class="fal fa-user-alt"></i>
                                    </div>
                                    @error('last_name')
                                        <label class="messages text-danger">{{ $errors->first('last_name') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Gender</h5>
                                    <div class="sign__input">
                                        <select name="gender" required value="{{ old('gender') }}">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <i class="far fa-venus-double"></i>
                                    </div>
                                    @error('gender')
                                        <label class="messages text-danger">{{ $errors->first('gender') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Mobile Number</h5>
                                    <div class="sign__input">
                                        <input type="phone" name="mobile" value="{{ old('mobile') }}"
                                            placeholder="91 9324302902" required>
                                        <i class="far fa-phone-alt"></i>
                                    </div>
                                    @error('mobile')
                                        <label class="messages text-danger">{{ $errors->first('mobile') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Email Id</h5>
                                    <div class="sign__input">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            placeholder="example@email.com" required> 
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    @error('email')
                                        <label class="messages text-danger">{{ $errors->first('email') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Date Of Birth</h5>
                                    <div class="sign__input">
                                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                            placeholder="10 / 20 / 2000" required>
                                        <i class="fal fa-birthday-cake"></i>
                                    </div>
                                    @error('date_of_birth')
                                        <label class="messages text-danger">{{ $errors->first('date_of_birth') }}</label>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>PinCode</h5>
                                    <div class="sign__input">
                                        <input type="text" name="pin_code" value="{{ old('pin_code') }}"
                                            placeholder="Pincode">
                                        <i class="fal fa-location"></i>
                                    </div>
                                    @error('pin_code')
                                        <label class="messages text-danger">{{ $errors->first('pin_code') }}</label>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Country</h5>
                                    <div class="sign__input">
                                        <input type="text" name="country" value="{{ old('country') }}"
                                            placeholder="India" readonly>
                                        <i class="far fa-flag"></i>
                                    </div>
                                    @error('country')
                                        <label class="messages text-danger">{{ $errors->first('country') }}</label>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>State</h5>
                                    <div class="sign__input">
                                        <select name="state" name="state" value="{{ old('state') }}">
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                            </select>
                                        <input type="text" name="state" value="{{ old('state') }}" placeholder="Goa">
                                        <i class="fal fa-location"></i>
                                    </div>
                                    @error('state')
                                        <label class="messages text-danger">{{ $errors->first('state') }}</label>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>City</h5>
                                    <div class="sign__input">
                                        <input type="text" name="city" value="{{ old('city') }}"
                                            placeholder="City">
                                        <i class="fal fa-location"></i>
                                    </div>
                                    @error('city')
                                        <label class="messages text-danger">{{ $errors->first('city') }}</label>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>PinCode</h5>
                                    <div class="sign__input">
                                        <input type="text" name="pin_code" value="{{ old('pin_code') }}"
                                            placeholder="Pincode">
                                        <i class="fal fa-location"></i>
                                    </div>
                                    @error('pin_code')
                                        <label class="messages text-danger">{{ $errors->first('pin_code') }}</label>
                                    @enderror
                                </div> --}}
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Password</h5>
                                    <div class="sign__input">
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            placeholder="password">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                    @error('password')
                                        <label class="messages text-danger">{{ $errors->first('password') }}</label>
                                    @enderror
                                </div>
                                <div class="col-lg-6 sign__input-wrapper mb-10">
                                    <h5>Confirm Password</h5>
                                    <div class="sign__input">
                                        <input type="password" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                    @error('password')
                                        <label class="messages text-danger">{{ $errors->first('password') }}</label>
                                    @enderror
                                </div>
                                <div class="sign__action d-sm-flex justify-content-between mb-30">
                                    <div class="sign__agree d-flex align-items-center">
                                        <input class="m-check-input" name="terms_conditions"
                                            @if (old('terms_conditions')) checked @endif type="checkbox"
                                            id="m-agree" required>
                                        <label class="m-check-label" for="m-agree">I accept terms and conditions
                                        </label>
                                    </div>
                                </div>
                                @error('terms_conditions')
                                    <label class="messages text-danger">{{ $errors->first('terms_conditions') }}</label>
                                @enderror
                                <button type="submit" class="m-btn m-btn-4 w-100"> <span></span> Sign Up</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sign area end -->
    </main>
@endsection
