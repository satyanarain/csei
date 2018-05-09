@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Vendors</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Vendors</li>
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
          <h4 class="card-title">Vendors List</h4>
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th width="10%">Name</th>
                 <th width="10%">Email</th>
                 <th width="10%">Contact No.</th>
                 <th width="10%">Date Created</th>
                 <th width="10%">Status</th>
                   @include('partials.action')
               </tr>
             </thead>
             <tbody>
              @foreach($vendors as $key=>$vendor)
              <tr>
               <td>{{$vendor->name}}</td>
               <td>{{$vendor->email}}</td>
               <td>{{$vendor->contact}}</td>
               <td>{{dateView($vendor->created_at)}}</td>
                <td>
                  <div 
                 <?php if($vendor->status==1)
                 { ?>
                 class="btn btn-small btn-success" 
               <?php }else{ ?>
                    class="btn btn-small btn-danger" 
              <?php } ?>
                 id="<?php echo $vendor->id; ?>" onclick="statusUpdate(this.id)">
                   <?php if($vendor->status==1)
                 { ?>
                    <span id="<?php echo "ai".$vendor->id; ?>"><i class="fa fa-check-circle"></i>&nbsp;Active</span>
               <?php }else{ ?>
                     <span id="<?php echo "ai".$vendor->id; ?>"><i class="fa fa-times-circle"></i>&nbsp;Inctive</span>
              <?php } ?></div>
              
                </td>
              <td>
                <a href="{{route('vendors.show', $vendor->id)}}" class="btn btn-primary m-b-10 m-l-5 left"><i class="fa fa-search"></i> View</a>
                <a href="{{route('vendors.edit', $vendor->id)}}" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-pencil"></i> Edit</a>
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
    url:'/vendors/statusupdate/'+id,
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