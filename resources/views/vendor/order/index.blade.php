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
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
