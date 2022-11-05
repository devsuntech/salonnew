@extends('admin.layouts.app')
@section('meta_title', 'Add New Gallery')
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
                    <form action="{{ route('vendor.gallery.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                @error('gallery_image')
                                    <label class="messages text-danger">{{ $errors->first('gallery_image') }}</label>
                                @else
                                    <label>Choose Image</label>
                                @enderror

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gallery_image[]" multiple>
                                        <label class="custom-file-label">Choose Image</label>
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
