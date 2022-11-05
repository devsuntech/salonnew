@extends("admin.layouts.app")
@section('meta_title','View Vendors')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            @if (session('success'))
            <div class="card-header bg-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))

            <div class="card-header bg-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="card-header">
                  <a class="btn btn-primary" href="{{ route('admin.vendor.create') }}" >Add New Vendor</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Owner Name</th>
                    <th>Salon Name</th>
                    <th>Mobile</th>
                    <th>status</th>
                    <th>Featured</th>
                    <th>Address</th>
                    <th>Register Date</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>

                    <td>{{ $data->name }} </td>
                    <td>{{ $data->firm_name }} </td>
                    <td>{{ $data->mobile }} </td>
                    <td>
                        <div class="custom-control custom-switch">
                          <input onChange="changStatus(this)" value="{{ $data->id }}" <?php if($data->status_id == 4) echo "checked";?> type="checkbox" class="custom-control-input" id="status{{$key}}">
                          <label class="custom-control-label" for="status{{$key}}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-switch">
                          <input onChange="changFeatured(this)" value="{{ $data->id }}" <?php if($data->featured == 1) echo "checked";?> type="checkbox" class="custom-control-input" id="featured{{$key}}">
                          <label class="custom-control-label" for="featured{{$key}}"></label>
                        </div>
                    </td>
                    <td>{{ $data->firm_address }}, {{optional($data->city)->name }}, {{optional($data->state)->name }}, {{ $data->country_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('jS F Y')}} </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.vendor.edit',$data->id) }}" >Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.vendor.delete',$data->id) }}" >Delete</a>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Owner Name</th>
                        <th>Salon Name</th>
                        <th>Mobile</th>
                        <th>status</th>
                        <th>Featured</th>
                        <th>Address</th>
                        <th>Register Date</th>
                        <th>Option</th>
                    </tr>
                  </tfoot>
                </table>
                @if ($datas->hasPages())
                    <div class="pagination-wrapper float-sm-right">
                         {{ $datas->links() }}
                    </div>
                @endif
              </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
        function changStatus(el){
               if(el.checked){
                   var status = 4;
               }
               else{
                   var status = 1;
               }
               $.post('{{ route('admin.vendor.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                   if(data == 4){
                       $(function() {
                         const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000
                          });
                         Toast.fire({
                           type: 'success',
                           title: 'Salon Active Successfully'
                         })
                         console.log();
                       });
                   }
                   else{
                       $(function() {
                         const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000
                          });
                         Toast.fire({
                           type: 'error',
                           title: 'Salon Inactive Successfully'
                         })
                         console.log();
                       });
                   }
               });    
        }
        function changFeatured(el){
               if(el.checked){
                   var status = 1;
               }
               else{
                   var status = 0;
               }
               $.post('{{ route('admin.vendor.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                   if(data == 1){
                       $(function() {
                         const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000
                          });
                         Toast.fire({
                           type: 'success',
                           title: 'Salon Featured On Successfully'
                         })
                         console.log();
                       });
                   }
                   else{
                       $(function() {
                         const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',
                         showConfirmButton: false,
                         timer: 3000
                          });
                         Toast.fire({
                           type: 'error',
                           title: 'Salon Featured Off  Successfully'
                         })
                         console.log();
                       });
                   }
               });    
        }
</script>
@endsection
