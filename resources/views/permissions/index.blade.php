@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">All Permissions</h3> </div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">All Permissions</li>
			</ol>
		</div>
	</div>
	<!-- End Bread crumb -->
	@endsection
        @section('content')
	<!-- Container fluid  -->
	<div class="container-fluid">
		<!-- Start Page Content -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive m-t-40">
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							 @include('partials.action')
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
</div>
</div>
@endsection