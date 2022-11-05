@extends('admin.layouts.app')
@section('meta_title','Staff List')
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
                  <a class="btn btn-primary" href="{{ route('vendor.staff.create') }}" >Add New Staff</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Profile Pic</th>
                    <th>Name</th>
                    <th>Services</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/'.$data->profile_pic) }}" alt="{{  $data->name }}" width="80"/></td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->status }} </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('vendor.staff.edit',$data->id) }}" >Edit</a>
                        <a class="btn btn-danger" href="{{ route('vendor.staff.delete',$data->id) }}" >Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Profile Pic</th>
                        <th>Name</th>
                        <th>Services</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
