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
                    <li class="active">Roles</li>
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
              <h4 class="header">All Roles </h4>
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles as $key=>$role)
						<tr>
							<td>{{$role->display_name}}</td>
							<td>{{$role->description}}</td>
							<td>
								@if($role->id == 1 || $role->id == 2)
								@else 
								{!!Form::open(['method'=>'DELETE', 'route'=>['roles.destroy', $role->id]])!!}
									<button type="submit" class="btn btn-danger">Delete</button>
								{!!Form::close()!!}
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
                </div>
              </div>
            </div>
</div>
<!-- <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>All Roles <a href="{{route('roles.create')}}" class="btn btn-success pull-right">New Role</a></h4><br/>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $key=>$role)
					<tr>
						<td>{{$role->display_name}}</td>
						<td>{{$role->description}}</td>
						<td>
							@if($role->id == 1)
							@else 
							{!!Form::open(['method'=>'DELETE', 'route'=>['roles.destroy', $role->id]])!!}
								<button type="submit" class="btn btn-danger">Delete</button>
							{!!Form::close()!!}
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> -->
@endsection