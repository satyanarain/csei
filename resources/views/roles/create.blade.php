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
                <h5 class="breadcrumbs-title">Roles</h5>
                <ol class="breadcrumbs">
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                    <li class="active">Create Role</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
@endsection
@section('content')
<div class="section">

            <p class="caption">Roles are basically user types. There are basically three types of users in this system. Super Admin, is having the access to entire system.</p>
            <div class="divider"></div>
            
            <!--Borderless Table-->
            <div id="borderless-table">
              <h4 class="header">Create Roles </h4>
              <div class="row">
                <div class="col s12 m12 l12">
                	<div class="card-panel">
                            <h4 class="header2">Role Details</h4>
                            <div class="row">
                            	{!!Form::open(['route'=>'roles.store', 'id'=>'formValidate', 'class'=>'formValidate'])!!}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="name">Name*</label>
                                            <input id="name" name="name" type="text" data-error=".errorTxt1">
                                            <div class="errorTxt1"></div>
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea id="description" name="description" class="materialize-textarea validate" data-error=".errorTxt7"></textarea>
                                            <label for="description">Description*</label>
                                            <div class="errorTxt7"></div>
                                        </div>
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light cyan darken-2 right submit" type="submit" name="action">Submit
                                              <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
                                    </div>
                                {!!Form::close()!!}
                            </div>
                    </div>
               	</div>
              </div>
            </div>
</div>
<!-- <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Create Role</h4><br/>
			{!!Form::open(['route'=>'roles.store'])!!}
			<div class="form-group">
				{{Form::label('name', 'Name', ['class'=>'control-label'])}}
				{{Form::text('name', null, ['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('description', 'Description', ['class'=>'control-label'])}}
				{{Form::textarea('description', null, ['class'=>'form-control', 'rows'=>2])}}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div> -->
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript">
$("#formValidate").validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            
            description: {
				required: true,
				minlength: 15
            }
        },
        //For custom messages
        messages: {
            name:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            description: {
				required: "Enter description",
				minlength: "Description at least 15 characters"
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
@endpush