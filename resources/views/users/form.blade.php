    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
        <div class="col-lg-6">
              {!! Form::text('name',null , ['class' => 'form-control','required']) !!}
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
        <label class="col-lg-4 col-form-label" for="contact">Mobile <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!! Form::text('contact',null , ['class' => 'form-control','onkeypress'=>'return isIntegerKey(event)','pattern'=>"[1-9]{1}[0-9]{9}",'maxlength'=>"10"]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Designation<span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('roles[]', $roles, isset($user->roles)?$user->roles:[2], ["class"=>"form-control"])!!}
        </div>        
    </div> 

   <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Verifier / Approver (s) <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('approvers[]', $users, isset($user->approvers)?$user->approvers:null, ["class"=>"form-control", 'multiple'=>'multiple', 'required','style'=>'min-height:100px;'])!!}
        </div>        
    </div> 
   <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Status<span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('status', array('1'=>'Active','0'=>'Inactive'), isset($user->status)?$user->status:null, ["class"=>"form-control", 'required'=>'required','placeholder'=>'Select Status'])!!}
        </div>        
    </div> 


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
</script>


</script>
@endpush
