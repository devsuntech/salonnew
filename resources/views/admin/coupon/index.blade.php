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
                  <a class="btn btn-primary" href="{{ route('admin.coupon.create') }}" >Add New Coupon</a>
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
                        <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/'.$data->thumbnail) }}"width="120"/></td>
                    <td>{{ $data->coupon_code }} </td>
                    <td>{{ $data->title }} </td>
                    <td>{{ $data->coupon_type }} </td>
                    <td>@if( $data->discount_type=='percentage') {{ $data->discount }}% @else ₹ {{ $data->discount }} @endif </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.coupon.edit',$data->id) }}" >Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.coupon.delete',$data->id) }}" >Delete</a>
                    </td>
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
                            <th>Option</th>
                        </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
