@extends('admin.layouts.app')
@section('meta_title','Pages List')
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
                  <a class="btn btn-primary" href="{{route('admin.page.create')}}" >Pages</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Header Image</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/'.$data->header_img) }}" alt="{{  $data->name }}" width="80"/></td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->title }} </td>
                    <td>{{ $data->position }} </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.page.edit',$data->id) }}" >Edit</a>

                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Header Image</th>
                    <th>Title</th>
                    <th>Position</th>
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
