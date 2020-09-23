<!DOCTYPE html>
<html>
<head>
    <title>Threads Request</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">All Waiting Threads for Admin Approval</h3>
    <br>
    @foreach($threads as $res)
        <div>
            @php
                $user=\App\User::find($res->user_id);
            @endphp
            <p style="font-weight: bold;"><i style="color: #0a8e63;" class="glyphicon glyphicon-user"></i> <span style="font-weight: 600;color: #0a8e63;"> {{ $user->user_type }} : {{ $user->name }}</span>
                <span style="float: right;color: #0a8e63;"><i style="color: #0a8e63;" class="glyphicon glyphicon-time"></i> Posted At :{{ $res->created_at }}</span></p>
            <p style="font-weight: bold"><i style="color: #4e4e4e;" class="glyphicon glyphicon-globe"></i> <span style="color: #4e4e4e;font-weight: bold;"> {{ $res->category}} </span>
                <a href="{{ route('approveThread',$res->id) }}" style="float: right;color: #0a8e63;text-decoration: none;cursor: pointer;"><i class="glyphicon glyphicon-registration-mark"></i> Accept Request</a>
                <a href="{{ route('rejectThread',$res->id) }}" style="display: inline-block;color: red;text-decoration: none;cursor: pointer;margin-right: 25px;float: right;"><i class="glyphicon glyphicon-trash"></i> Reject Request</a>
            </p>
            <a style="color: #4e4e4e;text-decoration: none">{{ $res->details }}</a>
            <hr>
        </div>
    @endforeach
</div>
</body>
</html>