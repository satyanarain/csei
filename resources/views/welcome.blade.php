@extends('layouts.napp')

@section('content')
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="login-content card">
                      <div class="login-form">
                        <h4><img src="{{URL::to('images/logonicons/csei-200x200.png')}}"></h4>
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email address</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="help-block" style="color:#ff0000;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" placeholder="Password" id="password" type="password" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                                <label class="pull-right">
<!--                                    <a href="{{ route('password.request') }}">Forgotten Password?</a>-->
                                </label>

                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
