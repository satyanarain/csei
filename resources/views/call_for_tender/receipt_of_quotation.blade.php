@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">All Receipt of Quotation</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"> </li>
      </ol>
    </div>
  </div>
<!-- End Bread crumb -->
  @endsection
 @section('content')
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <div class="table-responsive m-t-40">
                
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th style="display:none">id</th>
                  <th>Date of Requisition</th>
                 <th>Requisition No.</th>
                   <th>Purpose</th>
                 @include('partials.action')
               </tr>
             </thead>
             <tbody>
                 
               <?php //print_r($vendor_quotation_lists) ; ?>  
                 
                 
              @foreach($vendor_quotation_lists as $vendor_quotation_lists)
              <tr>
                  <td style="display:none">{{$vendor_quotation_lists->id}}</td>
               <td>
                {{dateView($vendor_quotation_lists->due_date)}}
              </td>
                <td>{{$vendor_quotation_lists->request_no}}</td>
              
<!--                <td>{{$vendor_quotation_lists->purpose}}</td>-->
<!--                 <td>{{$vendor_quotation_lists->amount}}</td>-->
                 <td>
                 {{displayView($vendor_quotation_lists->purpose)}}
                 </td>
                <td>
                <?php 
                  $allready = alreadyComment('quotation_send_for_comparision', $vendor_quotation_lists->request_id, $vendor_quotation_lists->vendor_id,'request_id','vendor_id');
                $sql=DB::table('requests')->where('id',$vendor_quotation_lists->request_id)->first();
              $sql->category_id;
                ?>
                    @if($allready==0)
                    @if($sql->category_id==2)
                    <a href="{{route('call_for_tender.show',[$vendor_quotation_lists->id,'receipt_of_quotation'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-check-circle"></i> Send for Comparision</a>
                    @else
                    <a href="{{route('call_for_tender.show',[$vendor_quotation_lists->id,'receipt_of_quotation'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-check-circle"></i> Send for Admin Approval</a>
                    @endif
                    
                    
                    @else
                    <a href="{{route('call_for_tender.show',[$vendor_quotation_lists->id,'receipt_of_quotation'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-search"></i> View</a>
                   @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
         
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
<script type="text/javascript">
 function statusUpdate(id)
{
 $.ajax({
    type:'get',
    url:'/vendor_quotation_lists/statusupdate/'+id,
   success:function(data)
    {
   
    if(data==1)
    {
    $("#"+id).removeClass('btn-danger');   
    $("#"+id).addClass('btn-success');  
    $("#ai"+id).html('<i class="fa fa-check-circle"></i>Active');    
    }else{
    $("#"+id).removeClass('btn-success');   
    $("#"+id).addClass('btn-danger');    
    $("#ai"+id).html('<i class="fa fa-times-circle"></i>Inactive');    
    }
    
    }
});
}  
    
    
</script>