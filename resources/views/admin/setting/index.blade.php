@extends('admin.layouts.app')
@section('meta_title', 'App Settings')
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
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
                <div class="card-body">
                    <form action="{{ route('admin.setting.update') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('site_name')
                                    <label class="messages text-danger">{{ $errors->first('site_name') }}</label>
                                @else
                                    <label>Site Name</label>
                                @enderror
                                <input type="text" class="form-control" name="site_name" value="{{ old('site_name') ?? $data->site_name }}"placeholder="Enter Site Name">
                            </div>

                            <div class="form-group">
                                @error('contact_number')
                                    <label class="messages text-danger">{{ $errors->first('contact_number') }}</label>
                                @else
                                    <label>Contact Number</label>
                                @enderror
                                <input type="number" class="form-control" name="contact_number" value="{{ old('contact_number') ?? $data->contact_number }}"placeholder="Enter Contact Number">
                            </div>
                            <div class="form-group">
                                @error('contact_email')
                                    <label class="messages text-danger">{{ $errors->first('contact_email') }}</label>
                                @else
                                    <label>Contact Email Address </label>
                                @enderror
                                <input type="email" class="form-control" name="contact_email" value="{{ old('contact_email') ?? $data->contact_email }}"placeholder="Enter Contact Email Address">
                            </div>


                            <div class="form-group">
                                @error('facebook')
                                    <label class="messages text-danger">{{ $errors->first('facebook') }}</label>
                                @else
                                    <label>Facebook</label>
                                @enderror

                                <input type="text" class="form-control" name="facebook"  value="{{ old('facebook') ?? $data->facebook }}" placeholder="Enter Facebook">
                            </div>


                            <div class="form-group">
                                @error('twitter')
                                    <label class="messages text-danger">{{ $errors->first('twitter') }}</label>
                                @else
                                    <label>Twitter</label>
                                @enderror

                                <input type="text" class="form-control" name="twitter"  value="{{ old('twitter') ?? $data->twitter }}" placeholder="Enter Twitter">
                            </div>
                            <div class="form-group">
                                @error('linkedin')
                                    <label class="messages text-danger">{{ $errors->first('linkedin') }}</label>
                                @else
                                    <label>Linkedin</label>
                                @enderror

                                <input type="text" class="form-control" name="linkedin"  value="{{ old('linkedin') ?? $data->linkedin }}" placeholder="Enter Linkedin">
                            </div>
                            <div class="form-group">
                                @error('instagram')
                                    <label class="messages text-danger">{{ $errors->first('instagram') }}</label>
                                @else
                                    <label>Instagram</label>
                                @enderror

                                <input type="text" class="form-control" name="instagram"  value="{{ old('instagram') ?? $data->instagram }}" placeholder="Enter Instagram">
                            </div>

                            <div class="form-group">
                                @error('address')
                                    <label class="messages text-danger">{{ $errors->first('address') }}</label>
                                @else
                                    <label>Address</label>
                                @enderror
                                <textarea
                                class="form-control" rows="3" name="address"
                                    placeholder="Enter Address ...">{{ old('address') ?? $data->address }}</textarea>
                            </div>
                            <div class="form-group">
                                @error('meta_title')
                                    <label class="messages text-danger">{{ $errors->first('meta_title') }}</label>
                                @else
                                    <label>Meta Title</label>
                                @enderror

                                <input type="text" class="form-control" name="meta_title"  value="{{ old('meta_title') ?? $data->meta_title }}" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                @error('meta_description')
                                    <label class="messages text-danger">{{ $errors->first('meta_description')}}</label>
                                @else
                                    <label>Meta Description</label>
                                @enderror

                                <input type="text" class="form-control" name="meta_description"
                                value="{{ old('meta_description') ?? $data->meta_description }}"
                                    placeholder="Enter Meta Description">
                            </div>
                            <div class="form-group">
                                @error('brief_description')
                                    <label class="messages text-danger">{{ $errors->first('brief_description') }}</label>
                                @else
                                    <label>Brief Description</label>
                                @enderror
                                <textarea
                                class="form-control" rows="3" name="brief_description"
                                    placeholder="Enter Brief Description ...">{{ old('brief_description') ?? $data->brief_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Site Status</label>
                                <div class="form-group row">

                                    <div class="form-group  col-md-3 col-6 clearfix">

                                        <div class="icheck-primary d-inline">
                                          <input type="checkbox" id="site_status" @if(old('site_status')?? $data->site_status)) checked @endif name="site_status" value="1">
                                          <label for="site_status">
                                           Site Status
                                          </label>
                                        </div>
                                    </div>

                            <div class="form-group">
                                <img src="{{ asset('storage/'.$data->logo) }}" alt="{{  $data->site_name }}" width="80"/>
                            </div>
                            <div class="form-group">
                                @error('logo')
                                    <label class="messages text-danger">{{ $errors->first('logo') }}</label>
                                @else
                                    <label>Choose Logo</label>
                                @enderror

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo">
                                        <label class="custom-file-label">Choose Logo</label>
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
