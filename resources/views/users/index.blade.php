@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">All Users</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">All Users</li>
      </ol>
    </div>
  </div>
<style>
  .no-sort::after { display: none!important; }

.no-sort { pointer-events: none!important; cursor: default!important; }  
</style>
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
                 <th width="10%">Name</th>
                 <th width="10%">Email</th>
                 <th width="10%" class="no-sort">Designation</th>
              
                 <th width="30%" class="no-sort">Verifier/Approver (s)</th>
                 <th width="10%">Status</th>
                 <th width="30%" class="no-sort">Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($users as $key=>$user)
              <tr>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>
                @foreach($user->roles as $index=>$role)
                @if($index == 0)
                {{$role->display_name}}
                @else                
                {{', '.$role->display_name}}
                @endif
                @endforeach
              </td>
             <td>
                @foreach($user->approvers as $index=>$approver)
                @if($index == 0)
                {{$approver->name}}
                @else                
                {{', '.$approver->name}}
                @endif
                @endforeach
              </td>
              
              <td>
                  <div 
                 <?php if($user->status==1)
                 { ?>
                 class="btn btn-small btn-success" 
               <?php }else{ ?>
                    class="btn btn-small btn-danger" 
              <?php } ?>
                 id="<?php echo $user->id; ?>" onclick="statusUpdate(this.id)">
                   <?php if($user->status==1)
                 { ?>
                    <span id="<?php echo "ai".$user->id; ?>"><i class="fa fa-check-circle"></i>&nbsp;Active</span>
               <?php }else{ ?>
                     <span id="<?php echo "ai".$user->id; ?>"><i class="fa fa-times-circle"></i>&nbsp;Inctive</span>
              <?php } ?></div>
              
                </td>
             <td>
                <a href="{{route('users.show', $user->id)}}" class="btn btn-primary m-b-10 m-l-5 left"><i class="fa fa-search"></i> View</a>
                <a href="{{route('users.edit', $user->id)}}" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-pencil"></i> Edit</a>
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
    url:'/users/statusupdate/'+id,
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