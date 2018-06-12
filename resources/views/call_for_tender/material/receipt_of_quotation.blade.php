@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Quotation Details</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('vendor_quotation_lists.index')}}">All Comparison Sheets</a></li>
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
                <label class="col-lg-4 col-form-label" for="val-username">TOR</label>
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
           <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username"><b>Item Details</b></label>
                <div class="col-lg-6">
                
                </div>
            </div>

            {!!Form::open(['route'=>'call_for_tender.store', 'id'=>'formValidate', 
            'onsubmit'=>'return validatePan()',
            'autocomplete'=>'off',
            'class'=>'formValidate', 'files'=>true])!!}
            
            
   <table class="table table-bordered table-striped table-hover bank_table">
                     @foreach($vendor_quotation_lists as $vendor_value)
                     <tr><th colspan="7">
                             <table class="table table-bordered table-striped table-hover bank_table" style="border: none;">
                                 <tr>
                                     <th width="20%">Send For Comparision Analysis</th>
                                     <th  width="80%">Vendor Name</th>
                                 </tr>
                                 <tr>
                                     <th align="left" valign="top"><input type="hidden" name="vendor_id[]" id="send_for_omparision_analysis" value="{{$vendor_value->vendor_id}}">
                                     <span class="test">
                               <input type="checkbox" class="change_value_click" size="7" name="no_value[]"  readonly="readonly"  value="1" onclick="changeVlude(this.value)">
                              <input type="hidden" class="change_value" size="7" name="approved_vendor_id[]"   value="0"> 
                              <input type="hidden"  size="7" name="request_id"  readonly="readonly"  value="{{$vendor_value->request_id}}"> 
                            </span>
                                     </th>
                                     <th>{{$vendor_value->name}}
                                       </th>
                                 </tr>
                             </table>
                           </th>
                       </tr>
                    
                      <tr>
                        <th  class="table-row-heading">S No</th>
                        <th  class="table-row-heading">Product Name</th>
                        <th  class="table-row-heading">Quantity</th>
                        <th class="table-row-heading">Cost / PC</th>
                        <th  class="table-row-heading">Total Amount</th>
                        <th  class="table-row-heading">Requester Remark</th>
                        <th  class="table-row-heading">Vendor Remark</th>
                    </tr>  
                    <?php
                    $vendor_quotation_list_all = DB::table('vendor_quotation_lists')->select('*')
                            ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                            ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                            ->where('vendor_quotation_lists.request_id', $requests->id)
                            ->where('vendor_quotation_lists.vendor_id', $vendor_value->vendor_id)
                            ->get();
                    // print_r($vendor_quotation_list_all) 
                    ?>
                    @foreach($vendor_quotation_list_all as $vendor_value_all)
                    <tr>
                        <th>{{$vendor_value_all->s_no}}<input type="hidden" class="form-control product_code" size="5" name="material_id[]" value="{{$vendor_value->material_id}}" readonly="readonly">
                        </th>
                        <th>{{$vendor_value_all->product_name}}</th>
                        <th>{{$vendor_value_all->purchase_quantity}}</th>
                        <th>{{$vendor_value_all->purchase_unit_rate}}</th>
                        <th>{{$vendor_value_all->purchase_unit_amount}}</th>
                        <th>{{$vendor_value_all->remark}}</th>
                        <th>{{$vendor_value_all->vendor_remark}}</th>

                    </tr>
                    @endforeach
                 
                    @endforeach
                     <?php 
                
                      $allready = DB::table('quotation_send_for_comparision')->where('request_id',$requests->id)->count();
                
                   ?>
                </table>
            @if($allready==0)
                <table width="100%" cellspacing="4" cellpadding="4" border="0">
                    <tr><td align="right" valign="top" colspan="6" height="10"></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" colspan="6" style="text-align:left;">
                           @if($requests->category_id==2)
                            <input type="hidden" name="category_id" value="{{$requests->category_id}}" >
                            <button class="btn btn-primary submit" type="submit" name="send_for_admin_approval" value="send_for_admin_approval" onclick="return validateChecked()"><i class="fa fa-paper-plane"></i> Send For Comparision</button></td>
                           @else
                           <input type="hidden" name="category_id" value="{{$requests->category_id}}" >
                           <button class="btn btn-primary submit" type="submit" name="send_for_comparision" value="send_for_comparision" onclick="return validateChecked()"><i class="fa fa-paper-plane"></i> Send For Admin Approval</button></td>
                           @endif
                    </tr>
                </table> 
             @endif
            {!!Form::close()!!}        
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
    $(".test").on('click',function()
    {
    
        id=1;
      var v1= $(this).closest("th").find(".change_value").val(id);
    v2= $(this).closest('.inputGroup').find('input[name=quotation_approval_id]').val(id);
  
     
  });
  });
function validateChecked()
{
    
 var ck_box = $('input[type="checkbox"]:checked').length;
 if(ck_box==0)
 {
    alert("Please select at-least one vendor") ;
    return false;
 }
 }
</script>



@endpush