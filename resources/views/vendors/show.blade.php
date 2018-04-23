@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Verder</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">Verder</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  @endsection

  @section('content')
  <!-- Container fluid  -->
   <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2" style="border-bottom:#ccc 0px solid;">Vendor Details</h4>
      
                       <div   class="formmain" onclick="showHide(this.id)" id="personal1">
<div class="plusminusbutton" id="plusminusbuttonpersonal1">+</div>&nbsp;&nbsp; Personal Info
</div>
<div class="row1"  id="formpersonal1" style="display:none;">
<div class="form-group row">
        <label class="col-lg-4 col-form-label" for="name">Name Vendor</label>
        <div class="col-lg-6">
              {{$user->name}}
        </div>
    </div>
  <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="email">Email Vendor</label>
        <div class="col-lg-6">
       {{$user->email}}
        </div>
    </div>


   <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Contact Vendor</label>
        <div class="col-lg-6">
          {{$user->contact}}
        </div>
    </div>
    </div>          
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush