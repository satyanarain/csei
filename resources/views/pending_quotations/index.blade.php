@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Comparison Sheet</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Comparison Sheet</li>
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
          <h4 class="card-title">Comparison List</h4>
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
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
              @foreach($pending_quotations as $pending_quotations)
              <tr>
                  <td style="display:none">{{$pending_quotations->id}}</td>
               <td>
                {{dateView($pending_quotations->due_date)}}
              </td>
                <td>{{$pending_quotations->request_no}}</td>

                 <td>
                 {{displayView($pending_quotations->purpose)}}
                 </td>
                 <td>
                     <?php
                     $aready_approve_by_committee = alreadyComment('material_pendding_approval_details', $pending_quotations->request_id, $committee_officer_id, 'request_id', 'committee_officer_id');
                     ?>
                     @if($aready_approve_by_committee > 0) 
                     <a href="{{route('pending_quotations.show',[$pending_quotations->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5 pull-left"><i class="fa fa-search"></i> View</a>
                     @else
                     <a href="{{route('pending_quotations.show',[$pending_quotations->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5 pull-left"><i class="fa fa-check-circle" aria-hidden="true" style="color:white"></i> Approve</a>
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
    url:'/pending_quotations/statusupdate/'+id,
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