@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Vendor Details</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">All Venders</a></li>
        <li class="breadcrumb-item active">Vendor Details</li>
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
                     <div   class="formmain" onclick="showHide(this.id)" id="personal1">
<div class="plusminusbutton" id="plusminusbuttonpersonal1">-</div>&nbsp;&nbsp; Personal Info
</div>
<div class="row1"  id="formpersonal1" style="display:block;">
<div class="form-group row">
        <label class="col-lg-4 col-form-label" for="name">Name</label>
        <div class="col-lg-6">
              {{$vendors->name}}
        </div>
    </div>
  <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="email">Email</label>
        <div class="col-lg-6">
       {{$vendors->email}}
        </div>
    </div>


   <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Mobile</label>
        <div class="col-lg-6">
          {{$vendors->contact}}
        </div>
    </div>
    </div> 
        
<div   class="formmain" onclick="showHide(this.id)" id="bank1">
<div class="plusminusbutton" id="plusminusbuttonbank1">-</div>&nbsp;&nbsp; Bank Details
</div>
<div class="row1"  id="formbank1" style="display:block;">
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Bank Name <span class="text-danger">*</span></label>
        <div class="col-lg-6">
         
            {{$vendors->bank_name}}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Account No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
         
          {{$vendors->account_no}}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
        <div class="col-lg-6">
        
          {{$vendors->ifsc_code}}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="branch_address">Branch Address <span class="text-danger">*</span></label>
        <div class="col-lg-6">
         
          {{$vendors->bank_name}}
        </div>
    </div>
    
   @if($vendors->upload_document!='')
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="upload_document">Other Document<span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <a href="{{('/images/upload_document/'.$vendors->upload_document)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i></a>
        </div>
    </div>
    @endif

    
    
    
</div>
<div   class="formmain" onclick="showHide(this.id)" id="personal5">
<div class="plusminusbutton" id="plusminusbuttonpersonal5">-</div>&nbsp;&nbsp; Other Details
</div>
<div class="row1"  id="formpersonal5" style="display:block;">                  
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="registration_no">Registration No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
         
          {{$vendors->registration_no}}
          @if($vendors->registration_no_upload!='')
  
            <a href="{{('/images/registration_no_upload/'.$vendors->registration_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i></a>
 
    @endif
        </div>
    </div>
     
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="pan_no">PAN No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
  
          {{$vendors->pan_no}}  @if($vendors->pan_no_upload!='')
    
            <a href="{{('/images/pan_no_upload/'.$vendors->pan_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i></a>
   
    @endif
        </div>
    </div>
    
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="gst_no">GST No.<span class="text-danger">*</span></label>
        <div class="col-lg-6">
        
          {{$vendors->gst_no}}  @if($vendors->gst_no_upload!='')
    
            <a href="{{('/images/gst_no_upload/'.$vendors->gst_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i></a>
    
    @endif   
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