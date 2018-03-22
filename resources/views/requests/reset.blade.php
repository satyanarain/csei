@extends('layouts.napp')

@section('content')
<div class="unix-login">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="login-content card">
          <div class="login-form">
            <form class="login-form" method="POST" action="{{ route('set.password') }}">
              {{ csrf_field() }}
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="row form-group">
                <div class="input-field col s12 center">
                  <h4><img src="{{URL::to('images/logonicons/csei-200x200.png')}}"></h4>
                  <h4 class="header2">Password Details</h4>
                </div>
              </div>
              <div class="row form-group">
                  <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                  <div class="col-lg-8">                
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                  <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <label class="col-lg-4 col-form-label" for="password">Confirmation Password <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                  @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="input-field col s12">
                  <button type="submit" class="btn btn-primary col s12">Set Password</button>  
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
