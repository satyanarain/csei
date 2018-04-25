@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Users</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Purchase Committee</li>
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
          <h4 class="card-title">Purchase Committee List</h4>
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>Name</th>
                 <th>Member</th>
                 <th>Head</th>
                 <th>Created at</th>
                 <th width="20%" class="no-sort">Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($purchase_committees as $key=>$team)
              <tr>
               <td>{{$team->name}}</td>
               <td>{{displayNameFoMultipleID('users','id',$team->member_id)}}</td>
               <td>{{displayIdBaseName('users',$team->head_id,'name')}})</td>
             
               <th>{{dateView($team->created_at)}}</th>
             <td>
                <a href="{{route('purchase_committees.show', $team->id)}}" class="btn btn-primary m-b-10 m-l-5 left"><i class="fa fa-search"></i> View</a>
                <a href="{{route('purchase_committees.edit', $team->id)}}" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-pencil"></i> Edit</a>
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
