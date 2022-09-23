@extends('admin.layouts.app')
@section('meta_title','SubScription List')
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
                  <a >Subscription</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Message</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $key=>$data )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }} </td>
                    <td>{{ $data->email }} </td>
                    <td>{{ $data->message }} </td>
                </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Message</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
