<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif" background="{{ asset('images/login-background.jpg') }}">
<div class="container" align="center">
    <br>
    <a href="{{ url('/') }}" style="color: #22352f;font-size: 28px;text-decoration: none;cursor: pointer;">College Forums Association</a>
    <hr/>
    <form method="POST" action="{{ route('login') }}" style="width: 450px;border-style: ridge;padding: 15px;background: #22352f">
        {{ csrf_field() }}
        <img src="{{ asset('images/u1.png') }}" style="width: 200px;height: 200px;border-radius: 50%;">
        <br>
        <div class="input-group" style="margin-top: 20px;">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email  : "/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color:#fff;">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                   placeholder="Password : "/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color:#fff;">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group" style="float: left;">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember" style="vertical-align: top;color: #fff;font-family: serif;text-decoration: none;">
                {{ __('Remember Me') }}
            </label>
        </div>
        <br/>
        <div class="input-group" style="width: 100%;text-align: center">
            <button name="login" style="margin-right: 15px;display: inline-block;width: 100px;" type="submit" class="btn btn-danger glyphicon glyphicon-log-in"> Login</button>
            @if (Route::has('password.request'))
                <a style="color: white;" href="{{ route('password.request') }}">Forget password?</a>
            @endif
        </div>
        <br/>
        <div class="input-group">
            <a style="color: white" href="{{ route('register') }}">Not register yet? Click here to Register</a>
        </div>
    </form>
</div>
</body>
</html>














{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
