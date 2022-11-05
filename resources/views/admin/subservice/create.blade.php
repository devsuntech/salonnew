@extends('admin.layouts.app')
@section('meta_title', 'Add New Sub Service')
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
                    <form action="{{ route('admin.subservice.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('category')
                                    <label class="messages text-danger">{{ $errors->first('category') }}</label>
                                @else
                                   <label>Select Category</label>
                                @enderror
                                <select id="category" class="form-control select2" style="width: 100%;" name="category">
                                    <option value="">Select Category</option>
                                    @foreach (App\Models\Category::orderBy('name')->get() as $cat )
                                         <option value="{{ $cat->id }}" @if(old('category')==$cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @error('service')
                                    <label class="messages text-danger">{{ $errors->first('service') }}</label>
                                @else
                                   <label>Select Service</label>
                                @enderror
                                <select id="service" class="form-control select2" style="width: 100%;" name="service">
                                    <option value="">Select Service</option>
                                    @if(old('category'))
                                        @foreach (App\Models\Service::whereCategoryId(old('category'))->orderBy('name')->get() as $service )
                                            <option value="{{ $service->id }}" @if(old('service')==$service->id) selected @endif>{{ $service->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                              </div>
                            <div class="form-group">
                                @error('name')
                                    <label class="messages text-danger">{{ $errors->first('name') }}</label>
                                @else
                                    <label>Subservice Name</label>
                                @enderror
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"placeholder="Enter Subservice Name">
                            </div>
                            {{-- <div class="form-group">
                                @error('tags')
                                    <label class="messages text-danger">{{ $errors->first('tags') }}</label>
                                @else
                                    <label>Subservice Tags</label>
                                @enderror
                                <input type="text" class="form-control" name="tags" value="{{ old('tags') }}"placeholder="Enter Tags">
                            </div> --}}

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
<script type="text/javascript">
    $('#category').on('change', function() {
        console.log("change", $('#category').val())
        get_subcategory_by_category();
    });
    function get_subcategory_by_category(){
      var category_id = $('#category').val();
      $.post('{{route('getservice')}}',{_token:'{{ csrf_token() }}', id:category_id}, function(data){
          $('#service').html(null);
          $('#service').append($('<option value="">Select Service</option>', {

          }));
          console.log("Values are",data)
          for (var i = 0; i < data.length; i++) {
              $('#service').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
              $('.demo-select2').select2();
          }
      });
    }
  </script>
@endsection
