@extends('admin.layouts.app')
@section('meta_title', 'Edit Coupon')
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
                    <form action="{{ route('admin.coupon.update',$data->id) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('title')
                                    <label class="messages text-danger">{{ $errors->first('title') }}</label>
                                @else
                                    <label>Title</label>
                                @enderror
                                <input type="text" class="form-control" name="title" value="{{ old('title') ?? $data->title }}" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                @error('coupon_code')
                                    <label class="messages text-danger">{{ $errors->first('coupon_code') }}</label>
                                @else
                                    <label>Coupon Code</label>
                                @enderror
                                <input type="text" readonly class="form-control" name="coupon_code" value="{{ old('coupon_code') ?? $data->coupon_code }}" placeholder="Enter Coupon Code">
                            </div>
                            <div class="form-group">
                                @error('coupon_type')
                                    <label class="messages text-danger">{{ $errors->first('coupon_type') }}</label>
                                @else
                                    <label>Coupon Type</label>
                                @enderror
                                <select class="form-control" name="coupon_type" id="">
                                    <option value="">Select Coupon Type</option>
                                    <option value="single" @selected($data->coupon_type=='single')>Single</option>
                                    <option value="multiple" @selected($data->coupon_type=='multiple')>Multiple</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @error('discount_type')
                                    <label class="messages text-danger">{{ $errors->first('discount_type') }}</label>
                                @else
                                    <label>Discount Type</label>
                                @enderror
                                <select class="form-control" name="discount_type" id="">
                                    <option value="">Select Discount Type</option>
                                    <option value="percentage" @selected($data->discount_type=='percentage')>Percentage</option>
                                    <option value="flat" @selected($data->discount_type=='flat')>Flat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @error('dicount')
                                    <label class="messages text-danger">{{ $errors->first('dicount') }}</label>
                                @else
                                    <label>Minimum Booking Value</label>
                                @enderror
                                <input type="number" class="form-control" name="discount" value="{{ old('dicount')  ?? $data->discount }}"placeholder="Enter Discount">
                            </div>
                            <div class="form-group">
                                @error('minimum_booking_value')
                                    <label class="messages text-danger">{{ $errors->first('minimum_booking_value') }}</label>
                                @else
                                    <label>Minimum Booking Value</label>
                                @enderror
                                <input type="number" class="form-control" name="minimum_booking_value" value="{{ old('minimum_booking_value') ?? $data->minimum_booking_value }}"placeholder="Enter Minimum Booking Value">
                            </div>
                            <div class="form-group">
                                @error('maximum_discount_value')
                                    <label class="messages text-danger">{{ $errors->first('maximum_discount_value') }}</label>
                                @else
                                    <label>Maximum Discount Value</label>
                                @enderror
                                <input type="number" class="form-control" name="maximum_discount_value" value="{{ old('maximum_discount_value') ?? $data->maximum_discount_value }}"placeholder="Enter Maximum Discount Value">
                            </div>
                            <div class="form-group">
                                @error('start_date')
                                    <label class="messages text-danger">{{ $errors->first('start_date') }}</label>
                                @else
                                    <label>Start Date</label>
                                @enderror
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') ?? $data->start_date }}"placeholder="Choose Start Date">
                            </div>
                            <div class="form-group">
                                @error('expiry_date')
                                    <label class="messages text-danger">{{ $errors->first('expiry_date') }}</label>
                                @else
                                    <label>Expiry Date</label>
                                @enderror
                                <input type="date" class="form-control" name="expiry_date" value="{{ old('expiry_date') ?? $data->expiry_date }}"placeholder="Choose Expiry Date">
                            </div>
                            <div class="form-group">
                                @error('info')
                                    <label class="messages text-danger">{{ $errors->first('info') }}</label>
                                @else
                                    <label>Description</label>
                                @enderror
                                <textarea
                                class="form-control" rows="3" name="info"
                                    placeholder="Enter Description ...">{{ old('info') ?? $data->info }}</textarea>
                            </div>
                            <div class="form-group">
                               <img src="{{ asset('storage/'.$data->thumbnail) }}"width="210"/><br>
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
