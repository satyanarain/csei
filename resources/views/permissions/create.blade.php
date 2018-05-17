@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Create Permission</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">All Permissions</a></li>
                <li class="breadcrumb-item active">Create Permission</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    @endsection
    @section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                           
                            {!!Form::open(['route'=>'permissions.store', 'id'=>'formValidate', 'class'=>'formValidate'])!!}
                            <div class="form-group row">
                                
                                <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input id="name" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="name">Description <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection