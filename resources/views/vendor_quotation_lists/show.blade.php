@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Comparison Analysis Details</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('vendor_quotation_lists.index')}}">All Comparison Analysis</a></li>
            <li class="breadcrumb-item active">Comparison Analysis Details</li>
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

            {!!Form::open(['route'=>'vendor_quotation_lists.store', 'id'=>'formValidate', 
            'onsubmit'=>'return validatePan()',
            'autocomplete'=>'off',
            'class'=>'formValidate', 'files'=>true])!!}
            
            
   <table class="table table-bordered table-striped table-hover bank_table">
                     <?php 
                        $i=1;
                     foreach($vendor_quotation_lists as $vendor_value)
                     { ?>
                     <tr><th colspan="9">
                             <table class="table table-bordered table-striped table-hover bank_table" style="border: none;">
                                 <tr>
                                     <th width="20%">Vendor Name</th>
                                     <th  width="80%">{{$vendor_value->name}}
                                      <input type="hidden"  size="7" name="request_id"  readonly="readonly"  value="{{$vendor_value->request_id}}"> 
                                      <input type="hidden" name="vendor_id[]" id="send_for_omparision_analysis" value="{{$vendor_value->vendor_id}}">
                                      </th>
                                 </tr>
                                 
                             </table>
                           </th>
                       </tr>
                     
                      @include('partials.item_list')
                    <?php
                    $vendor_quotation_list_all = DB::table('vendor_quotation_lists')->select('*')
                            ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                            ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                            ->where('vendor_quotation_lists.request_id', $requests->id)
                            ->where('vendor_quotation_lists.vendor_id', $vendor_value->vendor_id)
                            ->get();
                   
                    ?>
                    <?php 
                 
                    foreach($vendor_quotation_list_all as $vendor_value_all)
                    {
                    
                    ?>
                    <tr>
                    @include('partials.item_list_sub')
                   <?php 
                     $allready = alreadyComment('committee_member_like_dislikes', $requests->id,Auth::id(),'request_id','committee_member_id');
                   ?>
                    </tr>
                    @if($allready==0)
                     <tr>
                         <th colspan="9">
                             <table>
                                 <tr>
                                      <td align="left" valign="top" class="likeclick" width="1%" style="border:none;">
                                      <input type="radio" class="change_value_like" size="7" name="no_value{{$i}}" required="required" style="margin:7px 0px 0px 0px;">
                                      <input type="hidden" class="like" size="7" name="userlike[]"   value="0"> 
                                      </td>
                                      <td align="left" valign="top" width="5%" style="border:none;">Like
                                      </td>
                                      <td align="left" valign="top" class="dislikeclick" width="1%" style="border:none;">
                                      <input type="radio" class="change_value_dislike" size="7" name="no_value{{$i}}" required="required" style="margin:7px 0px 0px 0px;">
                                      <input type="hidden" class="dislike" size="7" name="userdislike[]"   value="0"> 
                                     </td>
                                     <td align="left" valign="top" style="text-align:left;border:none;">Dislike</td>
                                  </tr>

                             </table>
                         </th>
                       </tr>
                       @endif
                    <?php 
                   
                    
                    } ?>
                      
                     <?php  $i++; } ?>
                </table>
            @if($allready==0)
                <table width="100%" cellspacing="4" cellpadding="4" border="0">
                    <tr><td align="right" valign="top" colspan="6" height="10"></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" colspan="6" style="text-align:left;">
                            <button type="reset" value="Reset" class="btn btn-primary submit">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Send For Approval</button></td>
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
    $(".likeclick").on('click',function()
    {
     id=1;
    var v1= $(this).closest("td").find(".like").val(id);
      var v1= $(this).closest("td").next('td').next('td').find(".dislike").val(0);
     // $(this).closest('td').next('td').find('input:text').show();
    });
    $(".dislikeclick").on('click',function()
    {
     id=1;
       var v1= $(this).closest("td").prev('td').prev('td').find(".like").val(0);
    var v1= $(this).closest("td").find(".dislike").val(id);
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