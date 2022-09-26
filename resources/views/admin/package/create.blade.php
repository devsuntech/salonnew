@extends('admin.layouts.app')
@section('meta_title', 'Add New Plan')
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
                    <form action="{{ route('admin.package.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('name')
                                    <label class="messages text-danger">{{ $errors->first('name') }}</label>
                                @else
                                    <label>Membership Plan Name</label>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Service Name">
                            </div>
                            <div class="form-group">
                                @error('price')
                                    <label class="messages text-danger">{{ $errors->first('price') }}</label>
                                @else
                                    <label>Plan Price</label>
                                @enderror
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter Price">
                            </div>
                            <div class="form-group">
                                @error('validity')
                                    <label class="messages text-danger">{{ $errors->first('validity') }}</label>
                                @else
                                    <label>Validity (In Days)</label>
                                @enderror
                                <input type="number" class="form-control" name="validity" value="{{ old('validity') }}" placeholder="Enter Validity (In Days)">
                            </div>
                            <div class="form-group">
                                @error('position')
                                    <label class="messages text-danger">{{ $errors->first('position') }}</label>
                                @else
                                    <label>Position</label>
                                @enderror
                                <input type="number" class="form-control" name="position" value="{{ old('position') }}" placeholder="Enter Position">
                            </div>
                            <div class="form-group">
                                @error('description')
                                    <label class="messages text-danger">{{ $errors->first('description') }}</label>
                                @else
                                    <label>Description</label>
                                @enderror
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter Description ..."  >{{ old('description') }}</textarea>
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
