@extends('layouts.napp')

@section('content')
<div class="unix-login">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="login-content card">
          <div class="login-form">
            @if (session('status'))
            <div class="alert alert-success" style="color: #ffffff;">
              {{ session('status') }}
            </div>
            @endif
            <form class="login-form" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}
              <div class="row form-group">
                <div class="input-field col s12 center">
                  <h4><img src="{{URL::to('images/logonicons/csei-200x200.png')}}"></h4>
                  <h4 class="header2">Forget Password</h4>
                </div>
              </div>
              <div class="row form-group">
                <div class="input-field col s12{{ $errors->has('email') ? ' error' : '' }}">
                  <label for="email" class="center-align">Email *</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="input-field col s12">
                  <button type="submit" class="btn btn-primary col s12">Send Password Reset Link</button>  
                </div>
              </div>
              <div class="row form-group">
                <div class="input-field col s12">
                  <p style="text-align: center;" class="margin sign-up"><a href="{{route('login')}}">Login</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
