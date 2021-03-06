<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>
</head>
<body style="font-family: serif;color: white;" background="{{ asset('images/login-background.jpg') }}">
<div class="container" align="center" style="margin-top: 50px;">
    {{--<h2 style="color:#fff;">College Forums Association</h2>--}}
    {{--<hr/>--}}
    <form method="POST" action="{{ route('updateProfile') }}"
          style="width: 500px;border-style: groove;padding-left: 50px;padding-right: 50px;padding-bottom: 15px;border-color: #fff;background: #22352f;">
        @csrf
        <br>
        <img src="{{ asset('images/u1.png') }}" style="width: 200px;height: 200px;border-radius: 50%;">
        <h3 style="color: white">User Profile</h3><br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input readonly maxlength="15" class="form-control" value="{{ $user->name }}"/>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input readonly class="form-control" value="{{ $user->email }}"/>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input name="password" type="password" required class="form-control"/>
        </div>
        <br/>
        <div class="input-group">
            <button name="save" style=" width: 190px;margin-right: 14px;" type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i>  Save Changes</button>
            <a href="{{ route('home') }}" style=" width: 190px" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i>  Cancel</a>
        </div>
    </form>
</div>
</body>
</html>