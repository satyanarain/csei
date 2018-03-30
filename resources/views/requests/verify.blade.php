@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Requests</h3> </div>
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
  <div class="container-fluid">
  <!-- Start Page Content -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">
              Request for Verify List
<!--              Requested Requests List-->
          </h4>
            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>Category</th>
                 <th>Amount</th>
                 <th>Created Date</th>
                 <th>Due Date</th>
                 <th>Purpose</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($requests as $key=>$request)
              <tr id="{{$request->id}}">
               <td>{{$request->name}}</td>
               <td>{{$request->amount}}</td>
               <td>
                {{dateView($request->created_at)}}
              </td>
              <td>
                {{dateView($request->due_date)}}
              </td>
              <td>
                {{$request->purpose}}
              </td>
              <td>
               <span class="{{$request->b_class}}">{{$request->c_status}}</span>
              </td>
                <td>
                    <a href="{{route('requests.show', [$request->id,'requested_requests'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-search"></i>View</a>
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
  
<div class="modal fade" id="common_details" role="dialog">
  <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-view" >
<!--                <button type="button" class="close" data-dismiss="modal"><font class="white">&times;</font></button>-->
                <h4 class="viewdetails_details"><i class="fa fa-comments-o" style="font-size:48px;color:blue"></i>&nbsp;Comment</h4>
            </div>
            <div class="modal-body-view">
                 <div class="alert-new-success" id="add_new_data" style="display:none;"></div>
                 <div class="list-group-item alert alert-danger" id="add_new_data_danger" style="display:none;"></div>
                 <table class="table table-responsive.view">
                    <tr>       
                        <td>Name</td>
                        <td class="table_normal">
                            <texterea name="comment" id="comment" class="form-control">
                            <input name="request_id" id="request_id" class="form-control" type="hidden">
                            <input name="user_id" id="user_id" class="form-control" type="hidden">
                           
                        </td>
                    </tr>
                   </table>  
                  <div class="modal-footer">
                     <div  class="btn btn-success pull-left" onclick="AddNew()">Add New</div><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
</div>
 
<script>
function showRejection(request_id,user_id)
{

$("#common_details").modal('show');
 } 
    
    
    
    
function verifyRequest(id,user_id)
          {
            var r = confirm("Are you sure to verify?");
if (r == true) {
    if(id!='')
    {
         $(".loder_id").show(); 
     $.ajax({
             type :'get',
             url:'/requests/verify_request/'+id,
             data:"user_id="+user_id,
             success:function(data)
             {
              $(".loder_id").hide();  
               $("#"+id).fadeOut( "slow" ); 
              
             }
                  
            });
        }         
           
         
} else {
     return false;
    
} 
} 
function requestReject(id,user_id)
          {
            var r = confirm("Are you sure to verify?");
if (r == true) {
    if(id!='')
    {
         $(".loder_id").show(); 
     $.ajax({
             type :'get',
             url:'/requests/request_reject/'+id,
             data:"user_id="+user_id,
             success:function(data)
             {
              $(".loder_id").hide();  
               $("#"+id).fadeOut( "slow" ); 
              
             }
                  
            });
        }         
           
         
} else {
     return false;
    
} 
} 







</script>
  
  
  
@endsection
