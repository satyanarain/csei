@extends('layouts.master')
@section('breadcrumbs')
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
	<!-- Search for small screen -->
	<div class="header-search-wrapper grey hide-on-large-only">
		<i class="mdi-action-search active"></i>
		<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l12">
				<h5 class="breadcrumbs-title">Users</h5>
				<ol class="breadcrumbs">
					<li><a href="{{route('home')}}">Dashboard</a></li>
					<li><a href="{{route('users.index')}}">Users</a></li>
					<li class="active">User Details</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs end-->
@endsection
@section('content')
<div class="section">

	<p class="caption">There are basically three types of users in this system. Super Admin, is having the access to entire system.</p>
	<div class="divider"></div>

	<!--Borderless Table-->
	<div id="borderless-table">
		<h4 class="header">User Details </h4>
		<div class="row">
			<div class="col s12 m6 l6">	
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="{{URL::to('images/user-bg.jpg')}}" alt="user bg">
                    </div>
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
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">{{$user->name}} <i class="mdi-navigation-close right"></i></span>
                      <p>Here is some more information about this card.</p>
                      <p><i class="mdi-action-perm-identity"></i> {{$user->roles[0]->name}}</p>
                      <p><i class="mdi-action-perm-phone-msg"></i> {{$user->contact}}</p>
                      <p><i class="mdi-communication-email"></i> {{$user->email}}</p>
                      <p><i class="mdi-social-cake"></i> 18th June 1990
                        <p>
                          <p><i class="mdi-device-airplanemode-on"></i> BAR - AUS
                            <p>
                    </div>
                  </div>
                </div>

                <div class="col s12 m6 l6">
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
                </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush