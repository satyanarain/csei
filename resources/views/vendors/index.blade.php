@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Venders</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Venders</li>
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
          <h4 class="card-title">Venders List</h4>
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th width="10%">Name</th>
                 <th width="10%">Email</th>
                 <th width="10%">Contact</th>
                 <th width="10%">Created at</th>
                 <th width="10%">Updated at</th>
                 <th width="20%" class="no-sort">Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($users as $key=>$user)
              <tr>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->contact}}</td>
               <td>{{dateView($user->created_at)}}</td>
               <td>{{dateView($user->updated_at)}}</td>
              <td>
                <a href="{{route('vendors.show', $user->id)}}" class="btn btn-primary m-b-10 m-l-5 left"><i class="fa fa-search"></i> View</a>
                <a href="{{route('vendors.edit', $user->id)}}" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-pencil"></i> Edit</a>
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
