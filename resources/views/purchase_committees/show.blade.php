@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Purchase Committee Details</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('vendors.index')}}">Purchase Committees</a></li>
        <li class="breadcrumb-item active">Details</li>
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
                      <h4 class="header2" style="border-bottom:#ccc 0px solid;">Purchase Committee Details</h4>
                      <div class="form-group row">
                          <label class="col-lg-4 col-form-label" for="name">Name</label>
                          <div class="col-lg-6">
                              {{$purchase_committees->name}}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-4 col-form-label" for="name">Member(s)</label>
                          <div class="col-lg-6">
                              
                              {{displayNameFoMultipleID('users', $idIn = '',$purchase_committees->member_id)}}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-4 col-form-label" for="name">Head</label>
                          <div class="col-lg-6">
                              {{displayNameFoMultipleID('users', $idIn = '',$purchase_committees->head_id)}}
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