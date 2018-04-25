@extends('layouts.nmaster')
@section('breadcrumb')

<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Request</h3> </div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{route('requests.index')}}">Requests</a></li>
				<li class="breadcrumb-item active">Edit</li>
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
						<div class="row">
							<div class="col s12 m12 l12">
								<div class="card-panel">
									<h4 class="header2">Update Request</h4>
									
										{!!Form::model($request, ['route'=>['requests.update', $request->id], 'method'=>'PATCH', 'id'=>'formValidate', 'class'=>'formValidate', 'files'=>true])!!}
										@include('requests.form')
										{!!Form::close()!!}
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@push('scripts')

    @endpush