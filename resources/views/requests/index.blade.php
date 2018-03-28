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
          <h4 class="card-title">Requests List</h4>
            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>Category</th>
                 <th>Amount</th>
                 <th>Due Date</th>
                 <th>Created Date</th>
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
                {{dateView($request->due_date)}}
              </td>
              <td>
                {{dateView($request->created_at)}}
              </td>
              <td>
                {{$request->purpose}}
              </td>
              <td>
            <div class="badge badge-primary">  {{$request->c_status}}</div>
              </td>
              <td>
                <a href="{{route('requests.show', $request->id)}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-search"></i> View</a>
                @if($request->status == 1)
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
