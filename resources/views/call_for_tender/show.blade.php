@extends('layouts.nmaster')
@section('breadcrumb')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center" >
        @if($view=='call_for_tender_list')
        <h3 class="text-primary">Call For Tender Details</h3>
        
        </h3>
       @else
        <h3 class="text-primary">Receipt Quotation Details</h3> 
        @endif
        
    </div>

    <div class="col-md-7 align-self-center" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                 <?php if($view=='call_for_tender_list')
    { ?>
            <li class="breadcrumb-item active"><a href="{{route('call_for_tender.index')}}">Call For Tender Details</a></li>
          <?php } ?>
              <?php if($view=='receipt_of_quotation')
    { ?>
            <li class="breadcrumb-item active"><a href="{{route('receipt_of_quotation.call_for_tender')}}">Receipt Quotation Details</a></li>
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
 
?>
    <?php if($view=='coordinator')
    { ?>
@include('call_for_tender.material.material_coordinator_submission')
    <?php } ?>
    <?php if($view=='receipt_of_quotation')
    { ?>
@include('call_for_tender.material.receipt_of_quotation')
    <?php } ?>
 <?php if($view=='call_for_tender_list')
    { 
 
     ?>
@include('call_for_tender.material.call_for_tender_form')
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
        
      var  vendor_response_date    =   $("#vendor_response_date").val();
       var  vendor  =  $("#vendor").val();
      if(vendor=='')
    {
       alert("Please select at least one vendor.")     
        return false;
   
    }else if(vendor_response_date=='')
    { 
  alert("Please input vendor response date")     
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