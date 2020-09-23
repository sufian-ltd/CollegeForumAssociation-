<!DOCTYPE html>
<html>
<head>
    <title>Threads</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    <br/><br/>
    @php
        $user=\App\User::find(\Illuminate\Support\Facades\Auth::id());
        $user_type=$user->user_type;
    @endphp
    <p style="color: #0a8e63;font-weight: bold;"><i class="glyphicon glyphicon-user"></i> <span> {{ $user->user_type }} : {{ $user->name }}</span></p>
    <p style="color: #0a8e63;font-weight: bold;"><i style="color: #2f6fa7;" class="glyphicon glyphicon-hand-right"></i> <span> {{ $thread->category}} </span>
        <span style="float: right;"><i class="glyphicon glyphicon-time"></i> Posted At :{{ $thread->created_at }}</span></p>
    <p style="color: #000;">{{ $thread->details }}</p>
    <div style="margin-bottom: 15px;font-weight: bold;">
        @php $totalCom=\App\Comments::where('thread_id','=',$thread->id)->get()->count("id"); @endphp
        <p style="color: #0a8e63;display: inline-block;"><i class="glyphicon glyphicon-comment"></i> All comments ({{ $totalCom }})</p>
        @if($user_type=='Admin')
            @if($thread->is_favourite==1)
                <a href="{{ route('makeFavourite',$thread->id) }}" style="display: inline-block;color: #0a8e63;text-decoration: none;cursor: pointer;float: right;"><i class="glyphicon glyphicon-star"></i> Favourite (or click to un-favourite)</a>
            @else
                <a href="{{ route('makeFavourite',$thread->id) }}" style="display: inline-block;color: #4e4e4e;text-decoration: none;cursor: pointer;float: right;"><i class="glyphicon glyphicon-star"></i> Mark as Favourite</a>
            @endif

            @if($thread->is_delete==1)
                <a href="{{ route('makeBlock',$thread->id) }}" style="display: inline-block;color: red;text-decoration: none;cursor: pointer;margin-right: 25px;float: right;"><i class="glyphicon glyphicon-alert"></i> Blocked (or click to un-block)</a>
            @else
                <a href="{{ route('makeBlock',$thread->id) }}" style="display: inline-block;color: #4e4e4e;text-decoration: none;cursor: pointer;margin-right: 25px;float: right;"><i class="glyphicon glyphicon-alert"></i> Make As Block</a>
            @endif
        @endif
    </div>
    <div style="margin-left: 90px;">
        @foreach($comments as $res)
            @php
                $user=\App\User::find($res->user_id);
            @endphp
            <div style="font-weight: bold;">
                <p style="color: #0a8e63;"><i class="glyphicon glyphicon-user"></i> <span style="font-weight: 600;"> {{ $user->user_type }} : {{ $user->name }}</span>
                <span style="float: right;color: #0a8e63;font-weight: bold;"><i style="color: #0a8e63;font-weight: bold" class="glyphicon glyphicon-time"></i> Comment At :{{ $res->created_at }}</span>
                @if($user_type=='Admin')
                    <a href="{{ route('removeComment',[$res->id,$thread->id]) }}" style="display: inline-block;cursor: pointer;text-decoration: none;color: red;margin-right: 30px;float: right"><i class="glyphicon glyphicon-trash"></i> Remove Comment</a>
                @endif
                </p>
            </div>
            <p>{{ $res->details }}</p>
        @endforeach
        <form method="get" action="{{ route('addComment',$thread->id) }}">
        @csrf
        @if(($thread->is_delete)==0)
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                <textarea style="resize: none;    max-width: 100%;max-height: 100px;min-height: 100px;" required type="text" class="form-control" name="details" placeholder="Your Comment..."></textarea>
            </div>
            <br>
            <div class="input-group">
                <button style=" width: 100px;background-color: #197557;color: #fff;" type="submit" class="btn"><i class="glyphicon glyphicon-send"></i>  Submit</button>
            </div>
        @else
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                <textarea style="resize: none;    max-width: 100%;max-height: 100px;min-height: 100px;" disabled required type="text" class="form-control" name="details" placeholder="Your Comment..."></textarea>
            </div>
            <br>
            <div class="input-group">
                <button style=" width: 100px;background-color: #197557;color: #fff;" disabled type="submit" class="btn"><i class="glyphicon glyphicon-send"></i>  Submit</button>
            </div>
            @endif
        </form>
    </div>
</div>
<br/>
</body>
</html>