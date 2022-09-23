@extends('admin.layouts.app')
@section('meta_title','All Invoices')
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
                  <a class="btn btn-primary" href="{{ route('vendor.addinvoice') }}" >Create New Invoice</a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                   <thead>
                       <tr>
                           <th>S.No.</th>
                           <th>Invoice Number</th>
                           <th>Invoice Date</th>
                           <th>Customer Name</th>
                           <th>Customer Mobile</th>
                           <th>Grandtotal (<i class="fas fa-rupee-sign"></i>)</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       
                       @if(!empty($datas['allinvoices']))
                            @foreach($datas['allinvoices'] as $aI)
                                @php
                                    $date = date('d M Y',strtotime($aI->invoice_date));
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$aI->invoice_number}}</td>
                                    <td>{{$date}}</td>
                                    <td>{{$aI->customer_name}}</td>
                                    <td>{{$aI->customer_mobile}}</td>
                                    <td>{{$aI->grand_total}}</td>
                                    <td><a class="btn btn-sm btn-info" download target="_blank" href="{{asset('storage/uploads/invoices/'.$aI->invoice_file)}}"><i class="fas fa-file-pdf"></i>&nbsp;Download Invoice</a></td>
                                </tr>   
                            @endforeach
                       @else
                            <tr>
                                <td colsapn="5" align="center">no record found</td>
                            </tr>
                       @endif
                   </tbody>
                </table>
              </div>
             <div class="card-footer">
                 
             </div>
        </div>
    </div>
</section>
@endsection
