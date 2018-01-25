@extends('layouts.mapp')

@section('content')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="POST" action="{{ route('password.request') }}">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Reset Password</h4>
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
        <div class="row margin">
          <div class="input-field col s12{{ $errors->has('password') ? ' error' : '' }}">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label for="password" class="center-align">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12{{ $errors->has('password_confirmation') ? ' error' : '' }}">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <label for="password_confirmation" class="center-align">Confirmation Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light cyan darken-2 col s12">Reset Password</button>  
          </div>
          <div class="input-field col s12">
            <p class="margin sign-up"><a href="{{route('login')}}">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
