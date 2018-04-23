    <div   class="formmain" onclick="showHide(this.id)" id="personal1">
<div class="plusminusbutton" id="plusminusbuttonpersonal1">+</div>&nbsp;&nbsp; Personal Info
</div>
<div class="row1"  id="formpersonal1" style="display:none;">
<div class="form-group row">
        <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
        <div class="col-lg-6">
              {!! Form::text('name',null , ['class' => 'form-control']) !!}
        </div>
    </div>
  <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
        <div class="col-lg-6">
       {!! Form::text('email',null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="password">Password 
              @if($user->name=='')
            <span class="text-danger">*</span>
         @endif
        </label>
        <div class="col-lg-6">
        <input id="password" name="password" type="password" value="" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="confirm_password">Confirm Password 
            @if($user->name=='')
            <span class="text-danger">*</span>
            @endif
        </label>
        <div class="col-lg-6">
        <input id="confirm_password" name="confirm_password" type="password" value="" class="form-control">
        </div>
    </div>

   <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Contact <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('contact',null , ['class' => 'form-control','onkeypress'=>'return isIntegerKey(event)','pattern'=>"[1-9]{1}[0-9]{9}",'maxlength'=>"10"]) !!}
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
          {!! Form::text('bank_name',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Account No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('account_no',null , ['class' => 'form-control','onkeypress'=>'return isIntegerKey(event)']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('ifsc_code',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="branch_address">Branch Address <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::textarea('branch_address',null , ['class' => 'form-control']) !!}
        </div>
    </div>
</div><br>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="registration_no">Registration No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('registration_no',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="registration_no_upload">Registration No. Upload <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::file('registration_no_upload',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="pan_no">PAN No. <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('pan_no',null , ['class' => 'form-control','id'=>'pan_no']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="pan_no_upload">PAN No. Upload <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::file('pan_no_upload',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="gst_no">GST No.<span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('gst_no',null , ['class' => 'form-control']) !!}
        </div>
    </div>
     <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="gst_no_upload">GST No. Upload<span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::file('gst_no_upload',null , ['class' => 'form-control']) !!}
        </div>
    </div>
<input type="hidden" name="roles" value="9">

 <br>
 <div class="form-group row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-6">
            <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Submit
        </button>
        </div>
    </div>
@push('scripts')
<script type="text/javascript">
  $('#profile_picture').change(function () {
  var ext = $('#profile_picture').val().split('.').pop().toLowerCase();
 if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    $("#output").hide();
    $("#output_display").hide();
    alert('Only JPG, JPEG, PNG &amp; GIF files are allowed.' );
    return false;
    
}

});
 var loadFile = function(event) {
     
       $("#output_display").show();
       $("#output").show();
       $("#noimage").hide();
       
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };  
 
     function validateForm(){
      var usernane=   $("#user_name").val();
     nospace = usernane.split(' '); //we split the string in an array of strings using     whitespace as separator
     
     if(nospace.length>1)
     {
         alert("Space is not allowed in user name");
           return false; 
     }
     
     var ext = $('#profile_picture').val().split('.').pop().toLowerCase();
     if(ext!='')
     {
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
       $("#output").hide();
       alert('invalid extension!');
       return false;

       }
     }
 }  
 /*
function validatePan()
{
   
 var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
 var txtpan = $("#pan_no").val(); 

 
 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
  // alert('PAN match found');
  }
  else {
   alert("Not a valid PAN number");
   return false;
  } 
 } 
 else { 
       alert('Please enter 10 digits for a valid PAN number');
  return false;
 } 
 }
 */
 
 
</script>

@endpush
