@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Roles</h3> </div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item active">Roles</li>
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
					<h4 class="card-title">Roles</h4>
						<h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
						<div class="table-responsive m-t-40">
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
		</div>
	</div>
	@endsection