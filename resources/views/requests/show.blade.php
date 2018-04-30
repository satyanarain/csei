@extends('layouts.nmaster')
@section('breadcrumb')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        @if($requests->status==1)
        <h3 class="text-primary">Requested Request Details</h3>
        @elseif($requests->status==2)
        <h3 class="text-primary">Verified Request Details</h3>
        @elseif($requests->status==3)
        <h3 class="text-primary">Aproved Request Details</h3>
        @else
        <h3 class="text-primary">Request Details</h3> 
        @endif
    </div>

    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Requests</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
  <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
    <!-- Start Page Content -->
    <?php    
    $request_account=Request::fullUrl();
     $request_account=end(explode('?',$request_account));
    ?> 
    <?php if($view=='view')
    { ?>
	@include('requests.cash.cash_view')
    <?php } ?>
    <?php
    /*************verification system***************************************************/
    
    if($view=='requested_requests')
    { ?>
    
	@include('requests.cash.cash_verifier')
      
    <?php } ?>
    <?php if($view=='verifireactive')
    { ?>
	@include('requests.cash.cash_approver')
                                    
    <?php } ?>
    <?php if($view=='accountants')
    { ?>
        <a href="cash/cash_approver.blade.php"></a>
	@include('requests.cash.cash_voucher')
                                    
    <?php } ?>

</div>

</div>
</div>

@endsection
<script>

    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    }



    function loadAdd()
    {
        
      var  name_of_project    =   $("#name_of_project").val();
      var  project_expense_head  =  $("#project_expense_head").val();
       
    if(name_of_project=='')
    {
       alert("please enter name of project")     
        return false;
   
    }else if(project_expense_head=='')
    {
   alert("please enter project expense head")     
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