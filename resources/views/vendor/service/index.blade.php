@extends('admin.layouts.app')
@section('meta_title','Service List')
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
                  <a class="btn btn-primary" href="{{ route('vendor.service.create') }}" >Add New Service</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Tags</th>
                    <th>Price</th>
                    <th>Timing</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->vendorservice->name }} </td>
                    <td>{{ $data->tags }} </td>
                    <td>{{ $data->price }} </td>
                    <td>Min Time: {{ $data->minimum_time }}- Max Time: {{ $data->maximum_time}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('vendor.service.edit',$data->id) }}" >Edit</a>
                        <a class="btn btn-danger" href="{{ route('vendor.service.delete',$data->id) }}" >Delete</a>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Name</th>
                        <th>Tags</th>
                        <th>Price</th>
                        <th>Timing</th>
                        <th>Option</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
