@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">All GRN</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">All GRN</li>
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
              @foreach($reports as $reports)
              <tr>
                  <td style="display:none">{{$reports->id}}</td>
               <td>
                {{dateView($reports->due_date)}}
              </td>
                <td>{{$reports->request_no}}</td>
                <td>
                 {{displayView($reports->purpose)}}
                 </td>
                <td>
             <?php $sql=DB::table('goods_receiv_notes')->select('id','request_id')->where('request_id',$reports->request_id)->count(); 
             
             ?>
               @if($sql==0)
               <a href="{{route('goods_receiv_notes.show',[$reports->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-check-circle"></i> Create GRN</a>
                  @else 
                   <a href="{{route('goods_receiv_notes.show',[$reports->id,'view_details'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-check-circle"></i> View</a>
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