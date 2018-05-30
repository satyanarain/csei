@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Requests</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">All Requests</li>
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
                 <th>Category</th>
                  <th>Purpose</th>
                  <th>Status</th>
                @include('partials.action')
               </tr>
             </thead>
             <tbody>
              @foreach($requests as $key=>$request)
              <tr>
                  <td style="display:none">{{$request->id}}</td>
               <td>
                {{dateView($request->due_date)}}
              </td>
                <td>{{$request->request_no}}</td>
               <td>{{displayView($request->name)}}</td>
                <td>{{$request->purpose}}</td>
<!--                 <td>{{$request->amount}}</td>-->
                 <td>
                 <div class="{{$request->b_class}}">  {{$request->c_status}}</div>
                 </td>
                <td>
                @if($request->status == 1)
                <a href="{{route('requests.edit', $request->id)}}" class="btn btn-success m-b-10 m-l-5 pull-left"><i class="fa fa-pencil"></i> Edit</a>
                @endif
                <a href="{{route('requests.show',[$request->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5 pull-left"><i class="fa fa-search"></i> View</a>
              
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