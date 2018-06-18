@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">PO. Reports</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">PO. Reports</li>
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
                  <th>S. No.</th>
                  <th>PO. No.</th>
                  <th>Requested By</th>
                 <th>Prepared By</th>
                 <th>Prepared On</th>
                 <th>Brief Details</th>
                 <th>PO issue to</th>
                  @include('partials.action')
                 </tr>
             </thead>
             <tbody>
              @foreach($reports as $key=>$reports)  
              <tr>
                  <td style="display:none">{{$reports->id}}</td>
               <td>
                {{displayView($reports->po_number)}}
              </td>
               <td>{{$reports->po_number}}</td>
               <td>{{displayView($reports->username)}}</td>
                <td>{{$reports->prepared_by_name}}</td>
                  <th>{{dateView($reports->created_at)}}</th>
                 <th>{{displayView($reports->description_of_use)}}</th>
                  <th>{{displayView($reports->vname)}}</th>
                
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