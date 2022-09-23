@extends('admin.layouts.app')
@section('meta_title','Ratings')
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

            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>User</th>
                    <th>Rating</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>S.NO.</th>
                        <th>User</th>
                        <th>Rating</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
</section>
@endsection
