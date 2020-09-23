<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>
</head>
<body style="font-family: serif;color: white;" background="{{ asset('images/login-background.jpg') }}">
<div class="container" align="center" style="margin-top: 50px;">
    <br>
    <a href="{{ url('/') }}" style="color:#22352f;font-size: 28px;text-decoration: none;cursor: pointer;">College Forums Association</a>
    <hr/>
    <form method="POST" action="{{ route('register') }}"
          style="width: 500px;border-style: groove;padding-left: 50px;padding-right: 50px;padding-bottom: 15px;border-color: #fff;background: #22352f;">
        @csrf
        <h3 style="color: white">User Registration</h3>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input required type="text" maxlength="15" class="form-control" name="name" id="name1" placeholder="Name : "/>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email : "/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                   placeholder="Password : "/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                   placeholder="Confirm Password : "/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
            <select name="user_type" class="form-control">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
                <option value="Alumni">Alumni</option>
                <option value="User">User</option>
            </select>
        </div>
        <br/>
        <div class="input-group">
            <!--            <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>-->
            <button name="register" style=" width: 190px;margin-right: 14px;" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i>  Register</button>
            <a href="{{ route('login') }}" name="login" style=" width: 190px" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-log-in"></i>  Login</a>
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
                {{--<div class="card-header">{{ __('Register') }}</div>--}}
                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('register') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                                {{--@error('name')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

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
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Select User Type') }}</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<select name="user_type" class="from-control">--}}
                                    {{--<option value="student">Student</option>--}}
                                    {{--<option value="teacher">Teacher</option>--}}
                                    {{--<option value="alumni">Alumni</option>--}}
                                    {{--<option value="user">User</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
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
