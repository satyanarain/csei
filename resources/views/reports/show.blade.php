@extends('layouts.nmaster')
@section('breadcrumb')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center" >
       
        <h3 class="text-primary">Reports Details</h3>
     </div>

    <div class="col-md-7 align-self-center" >
      <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
             <li class="breadcrumb-item active"><a href="{{route('reports.index')}}">All Reports</a></li>
            <li class="breadcrumb-item active">Reports Details</li>
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

    <?php if($view=='complete_view')
    { ?>
    @include('requests.cash.voucher_details')
     <?php } ?>
 
    <?php } ?>
    <?php
if($requests->category_id==2 || $requests->category_id==3)
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
    { 
     ?>
	@include('requests.material.material_approver')
      <?php } ?>
         <?php if($view=='finance_approval')
    { ?>
       @include('requests.material.material_finance_approval')
    <?php } ?>
        <?php if($view=='mainadmin_approval')
    { ?>
@include('requests.material.material_mainadmin_approval')
    <?php } ?>


    <?php if($view=='coordinator')
    { ?>
@include('requests.material.material_coordinator_submission')
    <?php } ?>
    <?php if($view=='receipt_of_quotation')
    { ?>
@include('requests.material.receipt_of_quotation')
    <?php } ?>



    <?php if($view=='call_for_tender_list')
    { ?>
@include('requests.material.call_for_tender_form')
    <?php } ?>
  
    <?php if($view=='complete_view')
    { ?>
    @include('requests.material.material_view_details')
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
   alert("Please enter comment.")     
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
      var  vendor  =  $("#vendor").val();
      if(vendor=='')
    {
       alert("Please select at least one vendor.")     
        return false;
   
    }else if(no_of_days=='')
    { 
  alert("Please enter select no of days.")     
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