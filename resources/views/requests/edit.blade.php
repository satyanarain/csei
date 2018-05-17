@extends('layouts.nmaster')
@section('breadcrumb')

<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Update Request</h3> </div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{route('requests.index')}}">All Requests</a></li>
				<li class="breadcrumb-item active">Update Request</li>
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