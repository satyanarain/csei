@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Requests</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Purchases</li>
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
<!--            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
            <div class="table-responsive m-t-40">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th>PO.</th>
                 <th>PO .Date</th>
                 <th>Vendor Name</th>
                 <th>Shipt To</th>
                 <th>Created Date</th>
                 <th>Status</th>
                @include('partials.action')
               </tr>
             </thead>
             <tbody>
              @foreach($purchases as $key=>$request)
              <tr>
               <td>{{$request->po_number}}</td>
               <td>{{dateView($request->po_date)}}</td>
              <td>{{$request->v_name}}</td>
              <td>{{displayView($request->s_name)}}</td>
              <td> {{dateView($request->created_at)}}</td>
              <td>
              <div class="{{$request->b_class}}">  {{$request->c_status}}</div>
              </td>
              <td>
                <a href="{{route('purchases.show',[$request->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-search"></i> View</a>
               
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
