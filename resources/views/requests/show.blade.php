@extends('layouts.nmaster')
@section('breadcrumb')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center" >
        @if($view=='view')
        <h3 class="text-primary">Requisition Details</h3>
        @elseif($view=='requested_requests')
        <h3 class="text-primary">Verified Request Details</h3>
        @elseif($view=='verifireactive')
        <h3 class="text-primary">Aproved Request Details</h3>
       
        @elseif($view=='finance_approval')
           <h3 class="text-primary">
            @if($requests->category_id==1 || $requests->category_id==2)
           Request for Finance Approval
            @else
           Request for Action Details
            @endif
        </h3>
        @elseif($view=='mainadmin_approval')
           <h3 class="text-primary">
            @if($requests->category_id==1 || $requests->category_id==2)
           Request for Main Admin Approval
            @else
           Request for Action Details
            @endif
        </h3>
        @elseif($view=='coordinator')
           <h3 class="text-primary">
            @if($requests->category_id==1 || $requests->category_id==2)
           Request for coordinator Action
            @else
           Request for Action Details
            @endif
        </h3>
        @elseif($view=='downloads')
        <h3 class="text-primary">Downloads Request Details</h3>
        @else
        <h3 class="text-primary">Request Details</h3> 
        @endif
        
    </div>

    <div class="col-md-7 align-self-center" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                 <?php if($view=='requested_requests')
    { ?>
            <li class="breadcrumb-item active"><a href="{{route('verifiers.requests')}}">Pending Verification</a></li>
          <?php } ?>
              <?php if($view=='verifireactive')
    { ?>
            <li class="breadcrumb-item active"><a href="{{route('approvers.requests')}}">Pending Approval</a></li>
              <?php } ?>
             </ol>
    </div>
</div>

<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
  <div class="row justify-content-center">
 <div class="col-lg-6">
    <!-- Start Page Content -->
    <?php    
    $request_account=Request::fullUrl();
     $request_account=end(explode('?',$request_account));
    ?> 
    
    <?php
    /*************verification system***************************************************/
 //echo $requests->category_id; 
    
    
if($requests->category_id==1)
    {
  if($view=='view')
    { ?>
	@include('requests.cash.cash_view')
    <?php } ?> 
    <?php
    
  if($view=='requested_requests')
    { ?>
    @include('requests.cash.cash_verifier')
     <?php } ?>
    <?php if($view=='verifireactive')
    { 
      ?>
	@include('requests.cash.cash_approver')
                                    
    <?php } ?>
    <?php if($view=='accountants')
    { ?>
@include('requests.cash.cash_voucher')
    <?php } ?>
    <?php if($view=='finance_approval')
    { ?>
@include('requests.cash.cash_finance_approval')
    <?php } ?>
    <?php if($view=='mainadmin_approval')
    { ?>
@include('requests.cash.cash_mainadmin_approval')
    <?php } ?>
    <?php if($view=='coordinator')
    { ?>
@include('requests.cash.cash_coordinator_submission')
    <?php } ?>
<?php if($view=='downloads')
    { ?>
@include('requests.cash.print_voucher')
     <?php } ?>
    <?php if($view=='complete_view')
    { ?>
    @include('requests.cash.voucher_details')
     <?php } ?>
    <?php if($view=='submit_bill')
    { ?>
    @include('requests.cash.bills')
     <?php } ?>
    <?php } ?>
    <?php
if($requests->category_id==2)
    {
    
    if($view=='view')
    { ?>
	@include('requests.material.material_view')
    <?php } ?> 
    <?php
    
  if($view=='requested_requests')
    { ?>
    @include('requests.material.material_verifier')
     <?php } ?>
    <?php if($view=='verifireactive')
    { ?>
	@include('requests.material.material_approver')
      <?php } ?>
    <?php if($view=='accountants')
    { ?>
@include('requests.material.material_quotation')
    <?php } ?>
    <?php if($view=='downloads')
    { ?>
@include('requests.material.print_voucher')
     <?php } ?>
    <?php if($view=='complete_view')
    { ?>
    @include('requests.material.material_view_details')
     <?php } ?>
    <?php if($view=='submit_bill')
    { ?>
    @include('requests.material.bills')
     <?php } ?>
    <?php } ?>
    <?php
if($requests->category_id==3)
    {
  if($view=='view')
    { ?>
	@include('requests.service.service_view')
    <?php } ?>   
    <?php
    
  if($view=='requested_requests')
    { ?>
    @include('requests.service.service_verifier')
     <?php } ?>
    <?php if($view=='verifireactive')
    { ?>
	@include('requests.service.service_approver')
      <?php } ?>
    <?php if($view=='accountants')
    { ?>
@include('requests.service.service_document')
    <?php } ?>
    <?php if($view=='downloads')
    { ?>
@include('requests.service.print_voucher')
     <?php } ?>
    <?php if($view=='complete_view')
    { ?>
    @include('requests.service.service_view_details')
     <?php } ?>
    <?php if($view=='submit_bill')
    { ?>
    @include('requests.service.bills')
     <?php } ?>
    <?php } ?>
   
</div>

</div>


</div>

@endsection

<script>
function printDiv(divName) {
   var printButton = document.getElementById("printableArea");
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
      printButton.style.visibility = 'hidden';
     window.print();
      printButton.style.visibility = 'visible';
     document.body.innerHTML = originalContents;
}
 function loadAdd()
    {
  var  comments    =   $("#comments").val();
     if(comments=='')
    {
   alert("please enter comments")     
        return false;
    }else {
       $(".loder_id").show();  
    }
}
 function loadAddApprove()
    {
 $(".loder_id").show();  
 
}
    function loadAddQuotation()
    {
        
      var  no_of_days    =   $("#no_of_day_all").val();
   //   alert(no_of_days);
      var  vendor  =  $("#vendor").val();
      
      
      
  
    if(vendor=='')
    {
       alert("please select at least one vendor")     
        return false;
   
    }else if(no_of_days=='')
    { 
  alert("please enter select no of days")     
        return false;
    }else {
       $(".loder_id").show();  
    }
}


    function Validate()
    {

    var comments = $("#comments").val();
    if (comments == '')
    {
    alert("Please enter comment.");
    return false;
    } else
    {
    $(".loder_id").show();
    //document.getElementById('theForm_verifier').submit();
    }
    }
</script>

<script>
function checkValue()
{
var expected_amont=$("#expected_amont").val(); 
var release_voucher_amount=$("#release_voucher_amount").val(); 
if(parseInt(release_voucher_amount) > parseInt(expected_amont))
  {
     alert("Please fill release amount is less than requested amount");
     return false;
      
  }
}
 function verifyRequest(id, user_id)
            {
            var amount_issued = $("#amount_issued").val();
            var date_issued = $("#date_issued").val();
            if (amount_issued == '')
            {
            alert("Please enter amount issued");
            return false
            }
            else if (date_issued == '')
            {
            alert("Please enter issued date");
            return false
            } else{

            $.ajax({
            type :'get',
                    url:'/requests/' + id + '/save_voucher',
                    data:"amount_issued=" + amount_issued + "&date_issued=" + date_issued,
                    success:function(data)
                    {
                    $("#amount_date").html(data);
                    $("#hiddenpdf").show();
                    $("#save").hide();
                    $("#amount_issued").hide();
                    $("#date_issued").hide();
                    }

            });
            }
            }
</script>




@push('scripts')

@endpush