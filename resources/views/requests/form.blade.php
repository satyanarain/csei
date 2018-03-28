    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="roles">Category <span class="text-danger">*</span></label>
        <div class="col-lg-6">
           {!!Form::select('category_id', $categories,isset($request->category_id) ? $request->category_id : selected,["class"=>"form-control", 'required', 'placeholder'=>'Please select a catrgory'])!!}
        </div>        
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="amount">Amount (Rs) <span class="text-danger">*</span></label>
        <div class="col-lg-6">
            <input id="amount" name="amount" type="number" min="0" id="amount" value="{{isset($request->amount)?$request->amount:''}}" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
        <div class="col-lg-6">
        <textarea id="purpose" name="purpose" class="form-control" required>{{isset($request->purpose)?$request->purpose:''}}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label" for="due_date">Due Date <span class="text-danger">*</span></label>
        <div class="col-lg-6">
        <input  name="due_date"  min="{{date('Y-m-d')}}" class="form-control multiple_date" required value="{{isset($request->due_date)?dateView($request->due_date):''}}" >
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
