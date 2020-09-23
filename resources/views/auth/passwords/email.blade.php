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
    <h3 style="color: #22352f;">Reset Password</h3>
    <hr/>
    @if (session('status'))
        <div class="form-control alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" style="width: 430px;border-style: ridge;padding: 15px;background: #22352f">
        {{ csrf_field() }}
        <img src="{{ asset('images/u1.png') }}" style="width: 200px;height: 200px;border-radius: 50%;">
        <br>
        <div class="input-group" style="margin-top: 20px;">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email  : "/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <!--            <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>-->
            <button style=" width: 190px;margin-right: 14px;" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-send"></i>  Send Password Reset Link</button>
            <a href="{{ route('login') }}" name="login" style=" width: 190px" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-log-in"></i>  Login</a>
        </div>
        <br>
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
                {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<form method="POST" action="{{ route('password.email') }}">--}}
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

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Send Password Reset Link') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
