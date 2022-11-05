@extends('admin.layouts.app')
@section('meta_title','View Service List')
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
                  <a class="btn btn-primary" href="{{ route('admin.service.create') }}" >Add New Service</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/'.$data->icon) }}" alt="{{  $data->name }}" width="80"/></td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->category->name }} </td>
                    <td>{!! $data->description !!} </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.service.edit',$data->id) }}" >Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.service.delete',$data->id) }}" >Delete</a>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Option</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
             <div class="card-footer">
                {{$datas->links()}}
             </div>
        </div>
    </div>
</section>
@endsection
