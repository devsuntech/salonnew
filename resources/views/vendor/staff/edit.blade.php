@extends('admin.layouts.app')
@section('meta_title', 'Edit Staff')
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
                    <form action="{{ route('vendor.staff.update',$data->id) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('name')
                                    <label class="messages text-danger">{{ $errors->first('name') }}</label>
                                @else
                                    <label>Staff Name</label>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $data->name }}"placeholder="Enter Category Name">
                            </div>

                            <div class="form-group">
                                @error('about_us')
                                    <label class="messages text-danger">{{ $errors->first('about_us') }}</label>
                                @else
                                    <label>About Us</label>
                                @enderror

                                <input type="text" class="form-control" name="about_us"
                                value="{{ old('about_us') ?? $data->description }} "
                                    placeholder="Enter Staf About Us">
                            </div>
                            <div class="form-group">
                                @error('services')
                                    <label class="messages text-danger">{{ $errors->first('services') }}</label>
                                @else
                                    <label>Services </label>
                                @enderror
                                <br>
                               @foreach(App\Models\Service::orderBy('name')->get() as $key => $service)
                               <div class="icheck-primary d-inline">
                                    <input type="checkbox" value="{{ $service->id }}" name="services[]" @checked((old('services') && in_array($service->id,old('services'))) || in_array($service->id,json_decode($data->services))) id="service{{ $key }}">
                                    <label for="service{{ $key }}">
                                    {{ $service->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/'.$data->profile_pic) }}" alt="{{  $data->name }}" width="80"/>
                            </div>
                            <div class="form-group">
                                @error('profile_pic')
                                    <label class="messages text-danger">{{ $errors->first('profile_pic') }}</label>
                                @else
                                    <label>Choose Profile Pic</label>
                                @enderror

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="profile_pic">
                                        <label class="custom-file-label">Choose Icon</label>
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
