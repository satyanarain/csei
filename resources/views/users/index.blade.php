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
          <li class="active">Users</li>
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
    <h4 class="header">All Users </h4>
    <div class="row">
      <div class="col s12 m12 l12">
        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
         <thead>
          <tr>
           <th>Name</th>
           <th>Role (s)</th>
           <th>Email</th>
           <th>Contact</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
        @foreach($users as $key=>$user)
        <tr>
         <td>{{$user->name}}</td>
         <td>
          @foreach($user->roles as $index=>$role)
          @if($index == 0)
          @if($role->id == 2 || $role->id == 3)
          {{$role->display_name}} ({{isset($user->state[0]->name) ? $user->state[0]->name : ''}})
          @else 
          {{$role->display_name}}
          @endif
          @else 
          @if($role->id == 2 || $role->id == 2)
          {{', '.$role->display_name}} ({{isset($user->state[0]->name) ? $user->state[0]->name : ''}})
          @else 
          {{', '.$role->display_name}}
          @endif
          @endif
          @endforeach
        </td>
        <td>{{$user->email}}</td>
        <td>{{$user->contact}}</td>
        <td>
          <a href="{{route('users.show', $user->id)}}" class="btn waves-effect waves-light cyan darken-2"><i class="mdi-action-search left"></i> View</a>
          <a href="{{route('users.edit', $user->id)}}" class="btn waves-effect waves-light teal"><i class="mdi-editor-mode-edit left"></i> Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection
@push('scripts')
<!-- <script type="text/javascript">
	$('select[name="data-table-simple_length"]').css('display', 'inline-block !important');
</script> -->
@endpush