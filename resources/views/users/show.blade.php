@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Users</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
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

<!--                <div class="col s12 m6 l6">
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header cyan">
                      <h4 class="task-card-title">My Task</h4>
                      <p class="task-card-date">March 26, 2015</p>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task1" />
                      <label for="task1">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                      </label>
                      <span class="task-cat teal">Mobile App</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task2" />
                      <label for="task2">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
                      </label>
                      <span class="task-cat purple">Web API</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task3" checked="checked" />
                      <label for="task3">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
                      </label>
                      <span class="task-cat pink">Mockup</span>
                    </li>
                    <li class="collection-item dismissable">
                      <input type="checkbox" id="task4" checked="checked" disabled="disabled" />
                      <label for="task4">I did it !</label>
                      <span class="task-cat cyan">Mobile App</span>
                    </li>
                  </ul>
                </div>-->
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