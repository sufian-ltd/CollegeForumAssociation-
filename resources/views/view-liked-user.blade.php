<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    <br/>
    @if($likedislike==1)
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">The People Who Liked This Post</h3>
    @else
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">The People Who Disliked This Post</h3>
    @endif
    <br/>
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Reaction</th>
        </tr>
        @php $i=0; @endphp
        @foreach($likes as $like)
            @php
                $i++;
                $user=\App\User::find($like->user_id);
            @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                @if(($like->like_dislike)==1)
                    <td>Liked</td>
                @else
                    <td>Disliked</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
<br/>
</body>
</html>