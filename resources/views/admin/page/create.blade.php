@extends('admin.layouts.app')
@section('meta_title', 'Add New Page')
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
                    <form action="{{ route('admin.page.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('name')
                                    <label class="messages text-danger">{{ $errors->first('name') }}</label>
                                @else
                                    <label>Page Name</label>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                @error('title')
                                    <label class="messages text-danger">{{ $errors->first('title') }}</label>
                                @else
                                    <label>Page Title</label>
                                @enderror
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"placeholder="Enter Page Title">
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
                                <textarea id="description"
                                class="form-control" rows="3" name="description"
                                    placeholder="Enter Description ...">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                @error('position')
                                    <label class="messages text-danger">{{ $errors->first('position') }}</label>
                                @else
                                    <label>Position</label>
                                @enderror

                                <input type="number" class="form-control" name="position"
                                value="{{ old('position') }}"
                                    placeholder="Enter Page Position">
                            </div>
                            <div class="form-group">
                                @error('header_img')
                                    <label class="messages text-danger">{{ $errors->first('header_img') }}</label>
                                @else
                                    <label>Choose Header</label>
                                @enderror

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="header_img">
                                        <label class="custom-file-label">Choose Header</label>
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
@section('script')
<script>
    $(function () {
    // Summernote
    $('#description').summernote()
    })
</script>
@endsection
