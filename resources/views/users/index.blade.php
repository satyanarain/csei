@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Users</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
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
          <h4 class="card-title">Users List</h4>
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>Name</th>
                 <th>Role (s)</th>
                 <th>Verifier (s)</th>
                 <th>Approver (s)</th>
<!--                 <th>Email</th>-->
<!--                 <th>Contact</th>-->
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($users as $key=>$user)
              <tr>
               <td>{{$user->name}}</td>
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
                @foreach($user->verifiers as $index=>$verifier)
                @if($index == 0)
                {{$verifier->name}}
                @else                
                {{', '.$verifier->name}}
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
<!--              <td>{{$user->email}}</td>-->
<!--              <td>{{$user->contact}}</td>-->
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
