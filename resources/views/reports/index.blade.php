@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Reports</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">All Reports</li>
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
                  <th>Requisition No.</th>
                  <th>Category Name</th>
                 <th>Requisition Date.</th>
                 <th>Requested By</th>
                 <th>Brief Details</th>
                 <th>Project Name</th>
                 <th>Project Head</th>
                 <th>Total Amount</th>
                 <th>Approver</th>
                  <th>Purpose</th>
                  <th>Status</th>
                  @include('partials.action')
                 </tr>
             </thead>
             <tbody>
              @foreach($reports as $key=>$reports)
              <tr>
                  <td style="display:none">{{$reports->id}}</td>
               <td>
                {{displayView($reports->request_no)}}
              </td>
               <td>{{$reports->name}}</td>
                <td>{{dateView($reports->due_date)}}</td>
               
               <td>{{displayView($reports->username)}}</td>
                <td>{{$reports->description_of_use}}</td>
                  <th>{{displayView($reports->name_of_project)}}</th>
                 <th>{{displayView($reports->project_expense_head)}}</th>
                 <th>{{displayView($reports->amount)}}</th>
                 <th>{{displayView($reports->approver_name)}}</th>
                 <td>{{$reports->purpose}}</td>
                 <td>
                 <div class="{{$reports->b_class}}">  {{$reports->c_status}}</div>
                 </td>
                  <td>
                   <a href="{{route('reports.show',[$reports->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5"><i class="fa fa-search"></i> View</a>
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
@push('scripts')
@endpush