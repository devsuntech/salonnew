@extends('admin.layouts.app')
@section('meta_title','Booking List')
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

            <div class="card-header bg-primary">
                <h3 class="card-title"> Bookings</h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>S.NO.</th>
                        <th>Booking No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Payment Status</th>
                        <th>Date & Time</th>
                        <th>Booking Date</th>
                        <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  {{-- {{dd($data)}} --}}
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$data->id ?? ''}}</td>
                    <td>{{optional($data->customerDetail)->name ?? ''}}</td>
                    <td>{{optional($data->customerDetail)->mobile ?? ''}}</td>
                    <td>{{$data->payment_status ?? ''}}</td>
                    <td>
                      {{$data->booking_date ?? ''}}
                      {{$data->booking_time ?? ''}}
                    </td>
                    <td>{{$data->booking_date ?? ''}}</td>
                    <td>{{$data->id ?? ''}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Booking No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Payment Status</th>
                        <th>Date & Time</th>
                        <th>Booking Date</th>
                        <th>Option</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
