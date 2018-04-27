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
      <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                                    <h4 class="header2">Create Request</h4>
									
										
                                                                                @include('requests.form')
										
									
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