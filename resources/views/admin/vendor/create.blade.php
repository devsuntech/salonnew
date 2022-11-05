@extends("admin.layouts.app")
@section('meta_title','Add New Vendor')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            @if(session('success'))
            <div class="card-header bg-success">
               {{session('success')}}
            </div>
            @elseif(session('error'))
            <div class="card-header bg-danger">
               {{session('error')}}
            </div>
            @else
            <div class="card-header bg-primary">
                @yield('meta_title')
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.vendor.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @error('name')
                                <label class="messages text-danger">{{ $errors->first('name') }}</label>
                            @else
                                <label>Vendor Name</label>
                            @enderror
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Vendor Name">
                        </div>
                        <div class="form-group">
                            @error('firm_name')
                                <label class="messages text-danger">{{ $errors->first('firm_name') }}</label>
                            @else
                                <label>Firm Name</label>
                            @enderror

                            <input type="text" class="form-control" name="firm_name"  value="{{ old('firm_name') }}" placeholder="Enter Firm Name">
                        </div>
                        <div class="form-group">
                            @error('country')
                                <label class="messages text-danger">{{ $errors->first('country') }}</label>
                            @else
                                <label>Country</label>
                            @enderror

                            <input type="text" class="form-control" name="country"
                            value="{{ old('country') }}"
                                placeholder="Enter Country">
                        </div>
                        <div class="form-group">
                            @error('state')
                                <label class="messages text-danger">{{ $errors->first('state') }}</label>
                            @else
                                <label>State</label>
                            @enderror

                            <input type="text" class="form-control" name="state"
                            value="{{ old('state') }}"
                                placeholder="Enter State">
                        </div>
                        <div class="form-group">
                            @error('city')
                                <label class="messages text-danger">{{ $errors->first('city') }}</label>
                            @else
                                <label>City</label>
                            @enderror

                            <input type="text" class="form-control" name="city"
                            value="{{ old('city') }}"
                                placeholder="Enter City">
                        </div>
                        <div class="form-group">
                            @error('tag_line')
                                <label class="messages text-danger">{{ $errors->first('tag_line') }}</label>
                            @else
                                <label>Tag Line</label>
                            @enderror

                            <input type="text" class="form-control" name="tag_line"
                            value="{{ old('tag_line') }}"
                                placeholder="Enter Tag Line">
                        </div>
                        <div class="form-group">
                            @error('pincode')
                                <label class="messages text-danger">{{ $errors->first('pincode') }}</label>
                            @else
                                <label>Pin Code</label>
                            @enderror

                            <input type="number" class="form-control" name="pincode"
                            value="{{ old('pincode') }}"
                                placeholder="Enter PinCode">
                        </div>
                        <div class="form-group">
                            <label>Select Amenities</label>
                            <select class="form-control select2" style="width: 100%;" name="amenities[]" multiple>
                                <option value="">Select Amenities</option>
                                @foreach (App\Models\Amenity::orderBy('name')->get() as $amenity )
                                     <option value="{{ $amenity->id }}" @if(old('amenities') && in_array($amenity->id,old('amenities'))) selected @endif>{{ $amenity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error("serviceFor")
                            <label class="messages text-danger">{{ $errors->first('serviceFor') }}</label>
                               @else 
                               <label>Select Service For</label>
                            @enderror
                            
                            <select class="form-control select2" style="width: 100%;" name="serviceFor">
                                <option value="">Select Service For</option>
                                <option value="Male" @if(old('serviceFor')=='Male') selected @endif>Male</option>
                                <option value="Female" @if(old('serviceFor')=='Female') selected @endif>Female</option>
                                <option value="Unisex" @if(old('serviceFor')=='Unisex') selected @endif>Unisex</option>
                            </select>
                        </div>
                        <div class="form-group">
                            @error('firm_address')
                                <label class="messages text-danger">{{ $errors->first('firm_address') }}</label>
                            @else
                                <label>Firm Address</label>
                            @enderror
                            <textarea
                            class="form-control" rows="3" name="firm_address"
                                placeholder="Enter Firm Address ...">{{ old('firm_address') }}</textarea>
                        </div>
                        <div class="form-group">
                            @error('about_firm')
                                <label class="messages text-danger">{{ $errors->first('about_firm') }}</label>
                            @else
                                <label>About Firm</label>
                            @enderror
                            <textarea
                            class="form-control" rows="3" name="about_firm"
                                placeholder="Enter Details About Firm ...">{{ old('about_firm') }}</textarea>
                        </div>
                        <div class="form-group">
                            @error('email')
                                <label class="messages text-danger">{{ $errors->first('email') }}</label>
                            @else
                                <label>Email Address</label>
                            @enderror

                            <input type="text" class="form-control" name="email"
                            value="{{ old('email') }}"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            @error('mobile')
                                <label class="messages text-danger">{{ $errors->first('mobile') }}</label>
                            @else
                                <label>Contact Number</label>
                            @enderror

                            <input type="number"  class="form-control" name="mobile"
                            value="{{ old('mobile') }}"
                                placeholder="Enter Contact Number">
                        </div>

                        <div class="form-group">
                            @error('whatsapp_number')
                                <label class="messages text-danger">{{ $errors->first('whatsapp_number') }}</label>
                            @else
                                <label>Whatsapp Number</label>
                            @enderror

                            <input type="number"  class="form-control" name="whatsapp_number"
                            value="{{ old('whatsapp_number') }}"
                                placeholder="Enter Whatsapp Number">
                        </div>
                        <div class="form-group">
                            @error('gst_number')
                                <label class="messages text-danger">{{ $errors->first('gst_number') }}</label>
                            @else
                                <label>GST Number</label>
                            @enderror

                            <input type="text"  class="form-control" name="gst_number"
                            value="{{ old('gst_number') }}"
                                placeholder="Enter Gst Number">
                        </div>
                        <div class="form-group">
                            @error('gst_file')
                                <label class="messages text-danger">{{ $errors->first('gst_file') }}</label>
                            @else
                                <label>Choose GST File</label>
                            @enderror

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gst_file">
                                    <label class="custom-file-label">Choose GST File</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            @error('latitude')
                                <label class="messages text-danger">{{ $errors->first('latitude') }}</label>
                            @else
                                <label>Enter Latitude</label>
                            @enderror

                            <input type="text" class="form-control" name="latitude"
                            value="{{ old('latitude') }}"
                                placeholder="Enter Latitude">
                        </div>

                        <div class="form-group">
                            @error('longitude')
                                <label class="messages text-danger">{{ $errors->first('longitude') }}</label>
                            @else
                                <label>Enter Longitude</label>
                            @enderror

                            <input type="text" class="form-control" name="longitude"
                            value="{{ old('longitude') }}"
                                placeholder="Enter Longitude">
                        </div>




                        <div class="form-group">
                            @error('facebook')
                                <label class="messages text-danger">{{ $errors->first('facebook') }}</label>
                            @else
                                <label>Facebook</label>
                            @enderror

                            <input type="text"  class="form-control" name="facebook"
                            value="{{ old('facebook') }}"
                                placeholder="Enter Facebook">
                        </div>

                        <div class="form-group">
                            @error('twitter')
                                <label class="messages text-danger">{{ $errors->first('twitter') }}</label>
                            @else
                                <label>Twitter</label>
                            @enderror

                            <input type="text"  class="form-control" name="twitter"
                            value="{{ old('twitter') }}"
                                placeholder="Enter Twitter">
                        </div>
                        <div class="form-group">
                            @error('youtube')
                                <label class="messages text-danger">{{ $errors->first('youtube') }}</label>
                            @else
                                <label>Youtube</label>
                            @enderror

                            <input type="text"  class="form-control" name="youtube"
                            value="{{ old('youtube') }}"
                                placeholder="Enter Youtube Channel Link">
                        </div>
                        <div class="form-group">
                            @error('instagram')
                                <label class="messages text-danger">{{ $errors->first('instagram') }}</label>
                            @else
                                <label>Instagram</label>
                            @enderror

                            <input type="text" class="form-control" name="instagram"
                            value="{{ old('instagram') }}"
                                placeholder="Enter Instagram">
                        </div>
                        <div class="form-group">
                        <label>Payment Methods</label>
                        <div class="form-group row">

                            <div class="form-group  col-md-3 col-6 clearfix">

                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="paymentMethod1" @if(old('paymentMethod') && in_array('Gpay',old('paymentMethod'))) checked @endif name="paymentMethod[]" value="Gpay">
                                  <label for="paymentMethod1">
                                    Gpay
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="paymentMethod2" @if(old('paymentMethod') && in_array('UPI',old('paymentMethod'))) checked @endif name="paymentMethod[]" value="UPI">
                                  <label for="paymentMethod2">
                                   UPI
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="paymentMethod3" @if(old('paymentMethod') && in_array('Paytm',old('paymentMethod'))) checked @endif name="paymentMethod[]" value="Paytm">
                                  <label for="paymentMethod3">
                                    Paytm
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="paymentMethod4" @if(old('paymentMethod') && in_array('Cards',old('paymentMethod'))) checked @endif name="paymentMethod[]" value="Cards">
                                  <label for="paymentMethod4">
                                    Cards
                                  </label>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="form-group">
                            <label>Facilities</label>
                        <div class="form-group row">
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="amenities1" @if(old('amenities') && in_array('Washroom',old('amenities'))) checked @endif name="amenities[]" value="Washroom">
                                  <label for="amenities1">
                                    Washroom
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="amenities2" @if(old('amenities') && in_array('Parking',old('amenities')))  checked @endif name="amenities[]" value="Parking">
                                  <label for="amenities2">
                                   Parking
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="amenities3" @if(old('amenities') && in_array('Pet Friendly',old('amenities'))) checked @endif name="amenities[]" value="Pet Friendly">
                                  <label for="amenities3">
                                    Pet Friendly
                                  </label>
                                </div>
                            </div>
                            <div class="form-group  col-md-3 col-6 clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="amenities4"  @if(old('amenities') && in_array('Home Appointment',old('amenities'))) checked @endif name="amenities[]" value="Home Appointment">
                                  <label for="amenities4">
                                    Home Appointment
                                  </label>
                                </div>
                            </div>
                        </div>
                        </div>




                        <div class="form-group">
                            @error('position')
                                <label class="messages text-danger">{{ $errors->first('position') }}</label>
                            @else
                                <label>Position</label>
                            @enderror

                            <input type="number" class="form-control" name="position"
                            value="{{ old('position') }}"
                                placeholder="Enter Vendor Position">
                        </div>



                        <div class="form-group">
                            @error('feature_image')
                                <label class="messages text-danger">{{ $errors->first('feature_image') }}</label>
                            @else
                                <label>Choose Feature Image</label>
                            @enderror

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="feature_image">
                                    <label class="custom-file-label">Choose Feature Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            @error('thumbnail')
                                <label class="messages text-danger">{{ $errors->first('thumbnail') }}</label>
                            @else
                                <label>Choose Thumbnail</label>
                            @enderror

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="thumbnail">
                                    <label class="custom-file-label">Choose Thumbnail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
