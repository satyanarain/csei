@extends('layouts.master')
@section('breadcrumbs')
<!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Users</h5>
                <ol class="breadcrumbs">
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li><a href="{{route('users.index')}}">Users</a></li>
                    <li class="active">Create User</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
@endsection
@section('content')
<div class="section">

            <p class="caption">There are basically three types of users in this system. Super Admin, is having the access to entire system.</p>
            <div class="divider"></div>
            
            <!--Borderless Table-->
            <div id="borderless-table">
              <h4 class="header">Create User </h4>
              <div class="row">
                <div class="col s12 m12 l12">
                	<div class="card-panel">
                            <h4 class="header2">User Details</h4>
                            <div class="row">
                            	{!!Form::open(['route'=>'users.store', 'id'=>'formValidate', 'class'=>'formValidate', 'files'=>true])!!}
                                @include('users.form')
                                {!!Form::close()!!}
                            </div>
                    </div>
               	</div>
              </div>
            </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    var role = $('#roles').val();
    if(role == 2 || role == 3)
    {
        $('#states_box').show();
    }else {
        $('#states_box').hide();
    }
});
$(document).on('change', '#roles', function(){
    var role = $('#roles').val();
    if(role == 2 || role == 3)
    {
        $('#states_box').show();
    }else {
        $('#states_box').hide();
    }
});
$("#formValidate").validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },

            email: {
                required: true
            },

            contact: {
                required: true
            },

            roles: {
                required: true
            }
        },
        //For custom messages
        messages: {
            name:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            email:{
                required: "Enter a email"
            },
            contact:{
                required: "Enter a contact"
            },
            roles: {
                required: "Select a role"
            }
        },
        errorElement : 'div',
        errorPlacement : function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
</script>
<script type="text/javascript">
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('.dropify-event').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
        });
    </script>
@endpush