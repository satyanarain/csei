@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Create Purchase Committee</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchase_committees.index')}}">Purchase Committee</a></li>
                <li class="breadcrumb-item active">Create Purchase Committee</li>
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
                                    {!!Form::open(['route'=>'purchase_committees.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                      'onsubmit'=>'return validateForm()',
                                    'files'=>true])!!}
                                    @include('purchase_committees.form')
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
              
        </div>
    
    @endsection

    @push('scripts')
 
    @endpush