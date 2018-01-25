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
                <h5 class="breadcrumbs-title">Permissions</h5>
                <ol class="breadcrumbs">
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="active">Permissions</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
@endsection

@section('content')
<div class="section">

            <p class="caption">Permissions are granted to the users depending on the user role. The User with Administrator role is having permissions to access and modify all data.</p>
            <div class="divider"></div>
            
            <!--Borderless Table-->
            <div id="borderless-table">
              <h4 class="header">All Permissions </h4>
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
						@foreach($permissions as $key=>$permission)
						<tr>
							<td>{{$permission->display_name}}</td>
							<td>{{$permission->description}}</td>
							<td>
								@if($permission->id == 1 || $permission->id == 2 || $permission->id == 3)
								@else 
								{!!Form::open(['method'=>'DELETE', 'route'=>['permissions.destroy', $permission->id]])!!}
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
			<h4>All permissions <a href="{{route('permissions.create')}}" class="btn btn-success pull-right">New permission</a></h4><br/>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($permissions as $key=>$permission)
					<tr>
						<td>{{$permission->display_name}}</td>
						<td>{{$permission->description}}</td>
						<td>
							@if($permission->id == 1)
							@else 
							{!!Form::open(['method'=>'DELETE', 'route'=>['permissions.destroy', $permission->id]])!!}
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