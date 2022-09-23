@extends('admin.layouts.app')
@section('meta_title', 'Create Invoice')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                @if(session('success'))
                <div class="card-header bg-success">
                   {{session('success')}}
                </div>
                @elseif(session('error'))
                <div class="card-header bg-danger">
                   {{session('error')}}
                </div>
                @else
                <div class="card-header bg-primary">
                    @yield('meta_title')
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('vendor.saveinvoice') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                             
                            <div class="form-group">
                                @error('customer_name')
                                    <label class="messages text-danger">{{ $errors->first('customer_name') }}</label>
                                @else
                                    <label>Customer Name</label>
                                @enderror
                                <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}"placeholder="Enter Customer name">
                            </div>
                            <div class="form-group">
                                    @error('customer_mobile')
                                        <label class="messages text-danger">{{ $errors->first('customer_mobile') }}</label>
                                    @else
                                        <label>Mobile</label>
                                    @enderror
                                    <input type="text" class="form-control" name="customer_mobile" value="{{ old('customer_mobile') }}"placeholder="Enter Customer mobile">
                                </div>
                            <legend>Particulars</legend>
                                <div class="row mt-2 mb-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped particularItemTable">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:center">Particulars</th>
                                                    <th style="vertical-align:center">Qty</th>
                                                    <th style="vertical-align:center">Rate</th>
                                                    <th style="vertical-align:center">Total</th>
                                                    <th style="vertical-align:center" rowspan="2"><a class="btn btn-sm btn-success" href="javascript:addnewrow();"><i class="fas fa-plus"></i></a></th>
                                                </tr>
            
                                            </thead>
                                            <tbody class="particular_item">
                                                 
                                                <tr class="row_1">
                                                    <td width="12%"><input type="hidden" id="id" value="0" name="particular_item[1][id]" />
                                                        <textarea name="particular_item[1][item_name]"  id="item_detail" class="form-control" rows="2" placeholder="Enter item description"></textarea>
                                                    </td>
                                                    <td width="5%"><input type="text" min="1" step="1" placeholder="Qty" name="particular_item[1][quantity]" id="quantity" class="form-control" value="1" onchange="calculateInvoiceAmount();" /></td>
                                                    <td width="10%"><input type="text" step="0.01" min="0.00" placeholder="Rate" name="particular_item[1][rate]" id="rate" class="form-control" value="0" onchange="calculateInvoiceAmount();" /></td>
                                                    <td width="10%"><input type="text" step="1" min="0" placeholder="Total" name="particular_item[1][total]" readonly class="form-control" id="total" value="0" /></td>
                                                    
                                                    <td width="2%"><a class="btn btn-sm btn-danger d-none" id="removebutton" href="javascript:removerow(1);"><i class="fas fa-trash"></i></a></td>
                                                </tr>
                                                
    
                                            </tbody>
                                            <input type="hidden" name="c" id="c" value="2" />
                                        </table>
                                    </div>
                                    
                                </div> 
                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6 BankDetails">
                                        
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6 align-items-end">
                                        <input type="hidden" name="subtotal" id="subtotal" value="0" />
                                         <input type="hidden" name="grandTotal" id="grandTotal" value="0" />

                                        <div class="table-responsive align-items-end float-right">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal</th>
                                                    <td class="subtotal"></td>
                                                </tr>
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <td class="h3 grandTotal"></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Invoice</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('script')
<script> 
    var currencySign = '<i class="fas fa-rupee-sign"></i>&nbsp;';
var calculateInvoiceAmount = function() {
            var totalAmount = 0;
            var actualPrice = 0;
              
             
            var taxApplied = $("input[name=applied_tax]:checked").val();
             $("table tbody.particular_item tr").each(function(index, value) {
                // console.log(index);
                var rate = parseFloat($(this).find('#rate').val());
                var quantity = parseInt($(this).find('#quantity').val());
                 
                 var receipt = parseFloat($(this).find('#receipt').val());
                // console.log("value=>"+rate+" quantity=>"+quantity+" cgst=>"+cgst+" sgst=>"+sgst+" igst=>"+igst)
                var total = 0;
                var subtotal = total = rate * quantity;
                actualPrice += total;
                 
                if (isNaN(subtotal)) {
                    subtotal = 0;
                }
                $(this).find('#total,#taxablevalue').val(parseFloat(subtotal));
                total = Math.round(total).toFixed(2);
                totalAmount += parseFloat(subtotal);
             });

            if (!isNaN(actualPrice)) {
                $(".subtotal").html(currencySign + Math.floor(actualPrice).toFixed(2));
            } else {
                actualPrice = 0;
            }
            $("#subtotal").val(Math.floor(actualPrice).toFixed(2));
           
             var totalAmount = Math.round(totalAmount);
            if (!isNaN(totalAmount)) {
                $(".grandTotal").html(currencySign + totalAmount);
            } else {
                totalAmount = 0;
            }
            $("#grandTotal").val(totalAmount);

            totalAmount = 0;
             actualPrice = 0; 
        }

        
    var addnewrow = function() {
        var c = $("#c").val();
        var cloneTr = $("table tbody.particular_item").find('.row_1').clone();
        cloneTr.attr('class', 'row_' + c);
        cloneTr.find('a#removebutton').attr('href', 'javascript:removerow(' + c + ')');
        cloneTr.find('a#removebutton').removeClass('d-none');
        cloneTr.find('#id').val('').attr('name', 'particular_item[' + c + '][id]');
        cloneTr.find('#item_detail').val('').attr('name', 'particular_item[' + c + '][item_name]');
        // cloneTr.find('#item_detail').val('').attr('onchange', 'javascript:getitemdetail(this.value,' + c + ')');
        cloneTr.find('#rate').val('').attr('name', 'particular_item[' + c + '][rate]');
        cloneTr.find('#quantity').val('').attr('name', 'particular_item[' + c + '][quantity]'); 

        cloneTr.find('#total').val('').attr('name', 'particular_item[' + c + '][total]');


        $("table tbody.particular_item").append(cloneTr);
        c++;
        $("#c").val(c);
    }
    var removerow = function(c, rowid) {
        
        $('.row_' + c).remove();
        calculateInvoiceAmount();
        
    }

    var gettaxavail = function(isTax) {
        
        $(".igstTaxOnly,.sgstTaxOnly").addClass('d-none');
        $("#ctax,#stax,#itax,#cTaxValue,#sTaxValue,#iTaxValue").val(0);
        calculateInvoiceAmount();
    }
</script>
@endsection
