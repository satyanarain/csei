@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Create Team</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('teams.index')}}">All Teams</a></li>
                <li class="breadcrumb-item active">Create Team</li>
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
                                 {!!Form::open(['route'=>'teams.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                      'onsubmit'=>'return validateForm()',
                                    'files'=>true])!!}
                                    @include('teams.form')
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
    
    @endsection

    @push('scripts')
 
    @endpush