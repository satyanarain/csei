@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Quotation Details</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pending_quotations.index')}}">Quotations</a></li>
            <li class="breadcrumb-item active">Quotation Details</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
<div class="row justify-content-center" id='printableArea'>
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
              <div class="form-validation">
            <h4 class="header2">Requisition Details</h4>
             <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                <div class="col-lg-6">
                    {{$requests->request_no}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                <div class="col-lg-6">
                    {{$requests->name}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                <div class="col-lg-6">
                    {{dateView($requests->due_date)}}  
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                <div class="col-lg-6">
                    {{$requests->purpose}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                <div class="col-lg-6">
                    {{$requests->description_of_use}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                <div class="col-lg-6">
                    {{dateView($requests->required_by_date)}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Name Of Project</label>
                <div class="col-lg-6">
                    {{displayView($requests->name_of_project)}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
                <div class="col-lg-6">
                    {{displayView($requests->project_expense_head)}}
                </div>
            </div>
           
           <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Total Expected Expense</label>
                <div class="col-lg-6">
                    {{$requests->amount}}  
                </div>
            </div>

            <div   class="formmain" onclick="showHide(this.id)" id="bank1">
                <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; Item Details
            </div>
            {!!Form::open(['route'=>'pending_quotations.store', 'id'=>'formValidate', 
            'onsubmit'=>'return validatePan()',
            'autocomplete'=>'off',
            'class'=>'formValidate', 'files'=>true])!!}


            <div class="row1"  id="formbank1" >
              <table class="table table-bordered table-striped table-hover bank_table">
                   
                    @foreach($pending_quotations as $vendor_value)
                    <tr class="vendor_bg" style=" background-color:#f2f4f7"><th>Vendor Name</th>
                        <th>{{$vendor_value->name}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    <tr><th><div class="btn btn-primary" onclick="allComments({{$requests->id}},{{$vendor_value->vendor_id}})">All Comments</div></th>
                        <th>
                       <input type="hidden" class="form-control product_code" size="5" name="request_id[]" value="{{$requests->id}}" readonly="readonly">
                       <input type="hidden" class="form-control product_code" size="5" name="vendor_id[]" value="{{$vendor_value->vendor_id}}" readonly="readonly">
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                     <tr>
                        <th  class="table-row-heading">S No</th>
                        <th  class="table-row-heading">Product Name</th>
                        <th  class="table-row-heading">Quantity</th>
                        <th class="table-row-heading">Cost / PC</th>
                        <th  class="table-row-heading">Total Amount</th>
                        <th  class="table-row-heading">Requester Remark</th>
                        <th  class="table-row-heading">Vendor Remark</th>
                        <th  class="table-row-heading">Approval</th>

                    </tr>
                    <?php
                    $vendor_quotation_list_all = DB::table('pending_quotations')->select('*')
                            ->leftjoin('requests', 'requests.id', 'pending_quotations.request_id')
                            ->leftjoin('vendors', 'vendors.id', 'pending_quotations.vendor_id')
                            ->where('pending_quotations.request_id', $requests->id)
                            ->where('pending_quotations.vendor_id', $vendor_value->vendor_id)
                            ->get();
                    // print_r($vendor_quotation_list_all) 
                    ?>
                    @foreach($vendor_quotation_list_all as $vendor_value_all)
                    <tr>
                        <th><input type="text" class="form-control product_code" size="5" name="s_no[]" value="{{$vendor_value_all->s_no}}" readonly="readonly">
                            <input type="hidden" class="form-control product_code" size="5" name="material_id[]" value="{{$vendor_value_all->material_id}}" readonly="readonly">
                        </th>
                        <th><input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$vendor_value_all->product_name}}" readonly="readonly"></th>
                        <th> <input type="text" class="form-control" size="5" name="purchase_quantity[]"  required="required" value="{{$vendor_value_all->purchase_quantity}}" readonly="readonly"></th>
                        <th><input type="text" class="form-control" size="5" name="purchase_unit_rate[]"  required="required" readonly="readonly" value="{{$vendor_value_all->purchase_unit_rate}}"></th>
                        <th> <input type="text" class="form-control" size="7" name="purchase_unit_amount[]" readonly="readonly" value="{{$vendor_value_all->purchase_unit_amount}}"></th>
                        <th><input type="text" class="form-control" size="7" name="remark[]"  readonly="readonly"  value="{{$vendor_value_all->remark}}"></th>
                        <th><input type="text" class="form-control" size="7" name="vendor_remark[]"  readonly="readonly"  value="{{$vendor_value_all->vendor_remark}}"></th>
                        <th><input type="checkbox" class="form-control change_value_click" size="7" name="no_value[]"  readonly="readonly"  value="1" onclick="changeVlude(this.value)">
                           <input type="hidden" class="form-control changevalue" size="7" name="quotation_approval_id[]"  readonly="readonly"  value="0"> 
                            
                        </th>

                    </tr>
                    @endforeach
                    @endforeach
                </table>
                <table width="100%" cellspacing="4" cellpadding="4" border="0">
                    <tr><td align="right" valign="top" colspan="6" height="10"></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" colspan="6" style="text-align:left;">
                             <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Approve</button></td>
                    </tr>
                </table> 

            </div>
            {!!Form::close()!!}        
              </div>
  <div class="modal fade" id="view_detail" role="dialog">
  </div>

     </div>
     </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')

<script>
  $(document).ready(function()
  {
    $(".change_value_click").on('click',function()
    {
       // id= $(this).val();
       // alert(id)
      $(this).closest('.change_value').val(id)
      
  });
  });
    
    
    
    
    
    
   function closePop(id)
   {
   
       $('#comment').hide();
        
   }
    
       function allComments(request_id,vendor_id)
   {
     
   
   var urldata=   '/pending_quotations/comments/' + request_id;
    
    $.ajax({
		type: "GET",
		url: urldata,
		cache: false,
                data:"request_id="+request_id+"&vendor_id="+vendor_id,
		success: function(data){
                 //   alert(data);
                  $("#comment").show();
                  $("#vendorpopup_sub").html(data);
		}
	});
  
   }
</script>


@endpush