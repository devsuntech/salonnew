@extends('admin.layouts.app')
@section('meta_title', 'Edit Service')
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
                    <form action="{{ route('vendor.service.update',$data->id) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                @error('category')
                                    <label class="messages text-danger">{{ $errors->first('category') }}</label>
                                @else
                                    <label>Select Category</label>
                                @enderror
                                <select id="category" class="form-control select2" style="width: 100%;" name="category">
                                    <option value="">Select Category</option>
                                    @foreach (App\Models\Category::orderBy('name')->get() as $cat )
                                         <option value="{{ $cat->id }}" @if(old('category')==$cat->id || $cat->id==$data->category_id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                              </div> --}}

                              <div class="form-group">
                                @error('service')
                                    <label class="messages text-danger">{{ $errors->first('service') }}</label>
                                @else
                                    <label>Select Service</label>
                                @enderror
                                <select id="service" class="form-control select2" style="width: 100%;" name="service">
                                    <option value="">Select Service</option>
                                    @if($data->category_id)
                                    @foreach (App\Models\Service::whereCategoryId($data->category_id)->orderBy('name')->get() as $service )
                                         <option value="{{ $service->id }}" @if(old('service')==$service->id ||  $service->id==$data->service_id) selected @endif>{{ $service->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                              </div>
                             <div class="form-group">
                                @error('sub_service')
                                    <label class="messages text-danger">{{ $errors->first('sub_service') }}</label>
                                @else
                                     <label>Select Sub-Service</label>
                                @enderror
                                <select id="sub_service" class="form-control select2" style="width: 100%;" name="sub_service">
                                    <option value="">Select Service</option>
                                    @if($data->service_id)
                                    @foreach (App\Models\SubService::whereServiceId($data->service_id)->orderBy('name')->get() as $subservice )
                                         <option value="{{ $subservice->id }}" @if(old('sub_service')==$subservice->id || $subservice->id==$data->subservice_id) selected @endif>{{ $subservice->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                              </div>
                            <div class="form-group">
                                @error('price')
                                    <label class="messages text-danger">{{ $errors->first('price') }}</label>
                                @else
                                    <label>Service Price</label>
                                @enderror
                                <input type="number" class="form-control" name="price" value="{{ old('price') ?? $data->price }}"placeholder="Enter Subservice Price">
                            </div>
                            <div class="form-group">
                                @error('min_service_time')
                                    <label class="messages text-danger">{{ $errors->first('min_service_time') }}</label>
                                @else
                                    <label>Subservice Min Time</label>
                                @enderror
                                <input type="text" class="form-control" name="min_service_time" value="{{ old('min_service_time') ?? $data->minimum_time }}"placeholder="Enter Min Service Time">
                            </div>
                            <div class="form-group">
                                @error('max_service_time')
                                    <label class="messages text-danger">{{ $errors->first('max_service_time') }}</label>
                                @else
                                    <label>Subservice Max Time</label>
                                @enderror
                                <input type="text" class="form-control" name="max_service_time" value="{{ old('max_service_time') ?? $data->maximum_time }}"placeholder="Enter Max Service Time">
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
          }
      });
    }
    $('#service').on('change', function() {
        console.log("change", $('#service').val())
        get_subservice_by_service();
    });
    function get_subservice_by_service(){
      var service_id = $('#service').val();
      $.post('{{route('getSubService')}}',{_token:'{{ csrf_token() }}', id:service_id}, function(data){
          $('#sub_service').html(null);
          $('#sub_service').append($('<option value="">Select Sub Service</option>', {

          }));
          console.log("Values are",data)
          for (var i = 0; i < data.length; i++) {
              $('#sub_service').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
          }
      });
    }
  </script>
@endsection
