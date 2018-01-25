@extends('layouts.mapp')

@section('content')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      <form class="login-form" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Forget Password</h4>
            <p class="center">You can reset your password</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12{{ $errors->has('email') ? ' error' : '' }}">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light cyan darken-2 col s12">Send Password Reset Link</button>  
          </div>
          <div class="input-field col s12">
            <p class="margin sign-up"><a href="{{route('login')}}">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
