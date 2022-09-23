@extends('admin.layouts.app')
@section('meta_title', 'Change Password')
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
                @endif
                <div class="card-body">
                    @if(Auth::user()->user_type=='admin')
                    <form action="{{ route('admin.updatepassword') }}" method="POST" >
                     @elseif (Auth::user()->user_type=='vendor')
                    <form action="{{ route('vendor.updatepassword') }}" method="POST" >
                    @endif            
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('old_password')
                                    <label class="messages text-danger">{{ $errors->first('old_password') }}</label>
                                @else
                                    <label>Current Password</label>
                                @enderror
                                <input type="password" class="form-control" name="old_password" value="" placeholder="Enter Current Password">
                            </div>
                            <div class="form-group">
                                @error('password')
                                    <label class="messages text-danger">{{ $errors->first('password') }}</label>
                                @else
                                    <label>New Password</label>
                                @enderror
                                <input type="password" class="form-control" name="password" value="" placeholder="Enter New password">
                            </div>
                            <div class="form-group">
                                @error('password_confirmation')
                                    <label class="messages text-danger">{{ $errors->first('password_confirmation') }}</label>
                                @else
                                    <label>Confirm Password</label>
                                @enderror

                                <input type="password" class="form-control" name="password_confirmation"  value="" placeholder="Enter Confirm Password">
                            </div> 
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection 