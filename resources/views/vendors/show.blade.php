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
              {{$vendors->name}}
        </div>
    </div>
  <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="email">Email Vendor</label>
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
<div class="plusminusbutton" id="plusminusbuttonbank1">+</div>&nbsp;&nbsp; Bank Details
</div>
<div class="row1"  id="formbank1" style="display:none;">
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
</i>Download</a>
        </div>
    </div>
    @endif

    
    
    
</div><br>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="registration_no">Registration No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
         
          {{$vendors->registration_no}}
        </div>
    </div>
     @if($vendors->registration_no_upload!='')
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="registration_no_upload"></label>
        <div class="col-lg-6">
            <a href="{{('/images/registration_no_upload/'.$vendors->registration_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i>Download</a>
        </div>
    </div>
    @endif
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="pan_no">PAN No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
  
          {{$vendors->pan_no}}
        </div>
    </div>
      @if($vendors->pan_no_upload!='')
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="pan_no_upload"></label>
        <div class="col-lg-6">
            <a href="{{('/images/pan_no_upload/'.$vendors->pan_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i>Download</a>
        </div>
    </div>
    @endif
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="gst_no">GST No.<span class="text-danger">*</span></label>
        <div class="col-lg-6">
        
          {{$vendors->gst_no}}
        </div>
    </div>
     @if($vendors->gst_no_upload!='')
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="gst_no_upload"></label>
        <div class="col-lg-6">
            <a href="{{('/images/gst_no_upload/'.$vendors->gst_no_upload)}}" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i>
</i>Download</a>
        </div>
    </div>
    @endif        
                     
                     
                     
                     
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush