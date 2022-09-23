@extends("admin.layouts.app")
@section('meta_title','Add New Amenity')
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
                <form action="{{ route('admin.amenity.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @error('name')
                                <label class="messages text-danger">{{ $errors->first('name') }}</label>
                            @else
                                <label>Amenity Name</label>
                            @enderror
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Amenity Name">
                        </div>
                        <div class="form-group">
                            @error('icon')
                                <label class="messages text-danger">{{ $errors->first('icon') }}</label>
                            @else
                                <label>Amenity Icon</label>
                            @enderror
                            <input type="text" class="form-control" name="icon" value="{{ old('icon') }}"placeholder="Enter Amenity Icon">
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
