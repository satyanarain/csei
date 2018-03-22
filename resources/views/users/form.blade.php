    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input id="name" name="name" type="text" id="name" value="{{isset($user->name)?$user->name:''}}" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
        <div class="col-lg-6">
        <input id="email" name="email" type="email" value="{{isset($user->email)?$user->email:''}}" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="contact">Contact <span class="text-danger">*</span></label>
        <div class="col-lg-6">
        <input id="contact" name="contact" type="text" value="{{isset($user->contact)?$user->contact:''}}" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Role (s) <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('roles[]', $roles, isset($user->roles)?$user->roles:[2], ["class"=>"form-control", 'multiple'=>'multiple'])!!}
        </div>        
    </div> 
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Verifier (s) <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('verifiers[]', $users, isset($user->verifiers)?$user->verifiers:null, ["class"=>"form-control", 'multiple'=>'multiple', 'id'=>'verifiers', 'required'])!!}
        </div>        
    </div> 
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Approver (s) <span class="text-danger">*</span></label>
        <div class="col-lg-6">
          {!!Form::select('approvers[]', $users, isset($user->approvers)?$user->approvers:null, ["class"=>"form-control", 'multiple'=>'multiple', 'required'])!!}
        </div>        
    </div>    
    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="profile_picture">Profile Picture</label>
        <div class="col-lg-6">
        @if(isset($user->profile_picture))
        <input type="file" name="profile_picture" id="input-file-now" class="form-control" data-default-file="   {{URL::to('images/userProfiles/'.$user->profile_picture)}}" />
        @else 
        <input type="file" name="profile_picture" id="input-file-now" class="form-control" data-default-file="" />
        @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-6">
        <button class="btn btn-primary submit" type="submit" name="action">Submit
        </button>
        </div>
    </div>

@push('scripts')
<script type="text/javascript">
  var form_validation = function() {
    var e = function() {
            jQuery("#formValidate").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "name": {
                        required: !0,
                        minlength: 3
                    },
                    "email": {
                        required: !0,
                        email: !0
                    },
                    "roles": {
                        required: !0
                    },
                    "verifires": {
                        required: !0
                    },
                    "approvers": {
                        required: !0
                    },
                    "contact": {
                        required: !0,
                        minlength: 10,
                        number: !0
                    }
                },
                messages: {
                    "name": {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 3 characters"
                    },
                    "email": "Please enter a valid email address",
                    "roles": {
                        required: "Please select atleast one role"
                    },
                    "approvers": {
                        required: "Please select atleast one approver"
                    },
                    "verifires": {
                        required: "Please select atleast one verifire"
                    },
                    "contact": {
                        required: "Please provide a contact number",
                        minlength: "Your contact number must be at least 10 characters long",
                        number: "Contact number must be numeric"
                    }
                }
            })
        }
    return {
        init: function() {
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});
</script>
@endpush
