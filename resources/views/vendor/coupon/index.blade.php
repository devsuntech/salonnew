@extends('admin.layouts.app')
@section('meta_title','Coupon List')
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
                  
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>Thumbnail</th>
                        <th>Coupon Code</th>
                        <th>Title</th>
                        <th>Coupon Type</th>
                        <th>Discount</th>
                        <th>Active/Inactive</th>
                        <th>Valid Till</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php 
                    $vendor=App\Models\Vendor::whereUserId(Auth::id())->first();
                  @endphp
                  @foreach (App\Models\Coupon::where('expiry_date','>=',date('Y-m-d'))->where('start_date','<=',date('Y-m-d'))->get() as $key=>$data )
                  @php
                    if($selected_coupon=App\Models\VendorCoupon::whereVendorId($vendor->id)->whereCouponId($data->id)->first()){
                        $status=$selected_coupon->status;
                    } else{
                        $status=0;
                    }
                  @endphp
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/'.$data->thumbnail) }}"width="120"/></td>
                    <td>{{ $data->coupon_code }} </td>
                    <td>{{ $data->title }} </td>
                    <td>{{ $data->coupon_type }} </td>
                    <td>@if( $data->discount_type=='percentage') {{ $data->discount }}% @else ₹ {{ $data->discount }} @endif </td>
                    <td>
                        <div class="custom-control custom-switch">
                          <input onChange="changStatus(this)" value="{{ $data->id }}" @if($status==1) checked='checked' @endif type="checkbox" class="custom-control-input" id="status{{$key}}">
                          <label class="custom-control-label" for="status{{$key}}"></label>
                        </div>
                    </td>
                    <td>{{ $data->expiry_date }} </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>S.NO.</th>
                            <th>Thumbnail</th>
                            <th>Coupon Code</th>
                            <th>Title</th>
                            <th>Coupon Type</th>
                            <th>Discount</th>
                             <th>Active/Inactive</th>
                            <th>Valid Till</th>
                        </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
        function changStatus(el){
                if(el.checked){
                   var status = 1;
               }
               else{
                   var status = 0;
               }
               $.post('{{ route('vendor.active.coupon') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
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
                           title: 'Coupon Active Successfully'
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
                           title: 'Coupon Inactive Successfully'
                         })
                         console.log();
                       });
                   }
               });

                   
        }
</script>
@endsection
