@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">User Details</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">All Users</a></li>
        <li class="breadcrumb-item active">User Detail</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  @endsection

  @section('content')
  <?php //echo "<pre>";
  //print_r($user);
  ?>
  <!-- Container fluid  -->
    <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                    @if($user->profile_picture!='')
                    <div class="card-content">
                  <img src="{{URL::to('images/userProfiles/'.$user->profile_picture)}}" alt="" class="circle responsive-img activator card-profile-image profile-image" width='100px' height='100px'>
                  </div>
                  @else
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="{{URL::to('images/no_image.png')}}" alt="user bg">
                </div>
              @endif
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Name</label>
                  <div class="col-lg-6">
                      {{$user->name}}
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Email</label>
                  <div class="col-lg-6">
                      {{$user->email}}
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Contact</label>
                  <div class="col-lg-6">
                      {{$user->contact}}
                  </div>
              </div>
              
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Designation</label>
                  <div class="col-lg-6">
                     
                       {{displayNameFoMultipleID('roles', $idIn = '',$roleid_array)}}
                  </div>
              </div>
              
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Verifiers</label>
                  <div class="col-lg-6">{{$user->verifiers}}
                      {{displayNameFoMultipleID('users', $idIn = '',$user->verifiers)}}
                    </div>
              </div>
              <div class="form-group row">
                  <label class="col-lg-4 col-form-label" for="name">Approvers</label>
                  <div class="col-lg-6">
                     {{displayNameFoMultipleID('roles', $idIn = '',$user->approvers)}}
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