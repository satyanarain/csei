@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Vendors</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">Vendors</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    @endsection

    @section('content')
    
<!--       <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                                    <h4 class="header2">Requests Details</h4>-->
    
    
    
    <!-- Container fluid  -->
     <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2" style="border-bottom:#ccc 0px solid;">Vendor Details</h4>
      
                                    {!!Form::open(['route'=>'vendors.store', 'id'=>'formValidate', 'class'=>'formValidate', 'files'=>true])!!}
                                    @include('vendors.form')
                                    {!!Form::close()!!}
                                
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
 @push('scripts')
<script>
    
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
                    "password": {
                        required: !0,
                        password: !0
                    },
                    "confirm_password": {
                        required: !0,
                        confirm_password: !0
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
                     "password": {
                        required: "Please enter a password"
                    },
                     "confirm_password": {
                        required: "Please enter a confirm password"
                    },
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