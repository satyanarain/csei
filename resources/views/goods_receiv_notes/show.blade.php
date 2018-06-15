@extends('layouts.nmaster')
@section('breadcrumb')
<?php
 $request_only_view = Request::fullUrl();
$view = end(explode('?', $request_only_view));
  ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Create GRN</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('goods_receiv_notes.index')}}">All GRN</a></li>
            <li class="breadcrumb-item active">Create GRN</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
<div class="row justify-content-center" id='printableArea'>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <?php if($view=='view')
                    { ?>
                    {!!Form::open(['route'=>'goods_receiv_notes.store', 'id'=>'formValidate', 
                    'onsubmit'=>'return validatePan()',
                    'autocomplete'=>'off',
                    'class'=>'formValidate', 'files'=>true])!!}
                      @include('goods_receiv_notes.form')    
                    {!!Form::close()!!}  
                    <?php } else{ ?>
         
               <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Supplier</label>
                <div class="col-lg-6">
                   {{ $vendor_quotation_lists->name }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Receiving</label>
                <div class="col-lg-6">
                    {{$vendor_quotation_lists->recieving}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Order Date</label>
                <div class="col-lg-6">
                  {{ dateView($vendor_quotation_lists->created_at) }}
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Requisition Date</label>
                <div class="col-lg-6">
                  {{$requests->due_date}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Requisition By</label>
                <div class="col-lg-6">
                    {{$requests->username}} 
                </div>
            </div>
           
           <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username"><b>Item Details</b></label>
                <div class="col-lg-6">
                
                </div>
            </div>

                        <div class="table-scrollable form-body">      
                            <table class="table table-bordered table-striped table-hover bank_table">
                                 <tr>
                                    <th  class="table-row-heading">S No</th>
                                    <th  class="table-row-heading">Product Name</th>
                                    <th  class="table-row-heading">Order Qty.</th>
                                    <th  class="table-row-heading">Received Qty.</th>
                                    <th class="table-row-heading">Cost / PC</th>
                                    <th class="table-row-heading">GST</th>
                                    <th  class="table-row-heading">Total Amount</th>
                                 </tr>
                                <tr>
                                    <th>{{$vendor_quotation_lists->s_no}}
                                        <input type="hidden" class="form-control product_code" size="5" name="s_no" value="{{$vendor_quotation_lists->s_no}}" readonly="readonly">
                                        <input type="hidden" class="form-control product_code" size="5" name="material_id" value="{{$vendor_value->material_id}}" readonly="readonly">
                                    </th>
                                    <th>{{$vendor_quotation_lists->product_name}}
                                        <input type="hidden" class="form-control" size="5" name="product_name" required="required" value="{{$vendor_quotation_lists->product_name}}" readonly="readonly">
                                    </th>
                                    <th> {{$vendor_quotation_lists->purchase_quantity}}
                                        <input type="hidden" class="form-control" size="5" name="order_quantity"  required="required" value="{{$vendor_quotation_lists->purchase_quantity}}" readonly="readonly" placeholder="qty">
                                    </th>
                                    <th> <input type="text" class="form-control quantity2" size="5" name="receive_quantity"  required="required" value="{{$vendor_quotation_lists->receive_quantity}}"></th>
                                    <th><input type="text" class="form-control rate" size="5" name="purchase_unit_rate"  required="required" readonly="readonly" value="{{$vendor_quotation_lists->purchase_unit_rate}}"></th>
                                    <th><input type="text" class="form-control rate" size="5" name="gst"  required="required" readonly="readonly" value="{{$vendor_quotation_lists->gst}}"></th>
                                    <th> <input type="text" class="form-control" size="7" name="purchase_unit_amount" readonly="readonly" value="{{$vendor_quotation_lists->purchase_unit_amount}}"></th>
                                  </tr>
                            </table>   
                        </div> 
                    
                    
                    <?php } ?>  
                </div>  
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script>
    function checckTerm() {
        if ($('#chkterms').is(':checked')) {
           // alert('you agreed conditions')
 return true;
        } else {
            alert('please check terms & conditions')
            return false;
        }
    }
    function checckTermPop() {

        if ($('#chkterms').is(':checked')) {
            $("#comment").show();

        }
    }
    function closeTermandCondition() {
        $("#comment").hide();
    }
</script>
@endpush