@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Approved Request Lists</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Approved Request List</li>
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
<!--          <h4 class="card-title">Requests List</h4>-->
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>Category</th>
                 <th>Amount</th>
                 <th>Due Date</th>
                 <th>Requester Name</th>
                 <th>Requester Email</th>
                 <th>Verifier Name</th>
                 <th>Approver Name</th>
                 <th>Purpose</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($requests as $key=>$request)
              <tr>
               <td>{{$request->name}}</td>
               <td>{{$request->amount}}</td>
              <td>
                {{$request->due_date}}
              </td>
              <td>
                {{$request->requester_name}}
              </td>
              <td>
                {{$request->email}}
              </td>
              <td>
            
                {{displayIdBaseName('users',$request->verifire_id,'name')}}
              </td>
              <td>
               {{displayIdBaseName('users',$request->approver_id,'name')}}
              </td>
              <td>
                {{$request->purpose}}
              </td>
              <td>
               <div class="{{$request->b_class}}">  {{$request->c_status}}</div>
              </td>
              <td>
                <a href="{{route('requests.show', [$request->id,'accountants'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-pencil"></i>Edit</a>
                @if($request->status == '0' || $request->status == '5')
                <a href="{{route('requests.edit', $request->id)}}" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-pencil"></i> Edit</a>
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
