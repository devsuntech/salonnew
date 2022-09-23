@extends('admin.layouts.app')
@section('meta_title', 'Add New Category')
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
                    <form action="{{ route('admin.category.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('name')
                                    <label class="messages text-danger">{{ $errors->first('name') }}</label>
                                @else
                                    <label>Category Name</label>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                @error('meta_title')
                                    <label class="messages text-danger">{{ $errors->first('meta_title') }}</label>
                                @else
                                    <label>Meta Title</label>
                                @enderror

                                <input type="text" class="form-control" name="meta_title"  value="{{ old('meta_title') }}" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                @error('meta_description')
                                    <label class="messages text-danger">{{ $errors->first('meta_description') }}</label>
                                @else
                                    <label>Meta Description</label>
                                @enderror

                                <input type="text" class="form-control" name="meta_description"
                                value="{{ old('meta_description') }}"
                                    placeholder="Enter Meta Description">
                            </div>
                            <div class="form-group">
                                @error('description')
                                    <label class="messages text-danger">{{ $errors->first('description') }}</label>
                                @else
                                    <label>Description</label>
                                @enderror
                                <textarea
                                class="form-control" rows="3" name="description"
                                    placeholder="Enter Description ...">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                @error('bg_color')
                                    <label class="messages text-danger">{{ $errors->first('bg_color') }}</label>
                                @else
                                    <label>Background Color</label>
                                @enderror

                                <input height="50" type="color" value="{{ old('bg_color') }}" class="form-control" name="bg_color"
                                value="{{ old('bg_color') }}"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                @error('icon')
                                    <label class="messages text-danger">{{ $errors->first('icon') }}</label>
                                @else
                                    <label>Choose Icon</label>
                                @enderror

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="icon">
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
