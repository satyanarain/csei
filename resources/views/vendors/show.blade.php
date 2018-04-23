@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Users</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('venders.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Details</li>
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
             <div class="col s12 m6 l6">	
              <div id="profile-card" class="card">
                  @if($user->profile_picture!='')
                    <div class="card-content">
                  <img src="{{URL::to('images/userProfiles/'.$user->profile_picture)}}" alt="" class="circle responsive-img activator card-profile-image profile-image">
                  <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                    <i class="mdi-editor-mode-edit"></i>
                  </a>

                  <span class="card-title activator grey-text text-darken-4">{{$user->name}}</span>
                  <p><i class="mdi-action-perm-identity"></i> {{$user->roles[0]->name}}</p>
                  <p><i class="mdi-action-perm-phone-msg"></i> {{$user->contact}}</p>
                  <p><i class="mdi-communication-email"></i> {{$user->email}}</p>

                </div>
                  @else
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="{{URL::to('images/user-bg.jpg')}}" alt="user bg">
                </div>
              @endif
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">{{$user->name}} <i class="mdi-navigation-close right"></i></span>
                  <p>Here is some more information about this card.</p>
                  <p><i class="mdi-action-perm-identity"></i> {{$user->roles[0]->name}}</p>
                  <p><i class="mdi-action-perm-phone-msg"></i> {{$user->contact}}</p>
                  <p><i class="mdi-communication-email"></i> {{$user->email}}</p>
                  <p><i class="mdi-social-cake"></i> 18th June 1990</p>
                </div>

              </div>
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