@extends('layouts.nmaster')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
@section('breadcrumb')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        @if($category_id==3)
         <h3 class="text-primary">Single Vendor</h3> </div>
        @else
        <h3 class="text-primary">Comparison Analysis Details</h3>
</div>
        @endif
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

@if($view=='single_vendor_approval')
@include('mainadmin_likes_approval.partial_single_vendor_show')
@else
@include('mainadmin_likes_approval.partial_material_show')
@endif
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