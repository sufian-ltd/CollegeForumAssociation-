<!DOCTYPE html>
<html>
<head>
    @if($key=='timeline')
        <title>Timeline</title>
    @elseif($key=='blockedthreads')
        <title>Blocked Threads</title>
    @elseif($key=='newsfeed')
        <title>NewsFeed</title>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    @php
        $user=\App\User::find(\Illuminate\Support\Facades\Auth::id());
        $user_type=$user->user_type;
    @endphp
    @if($key=='timeline')
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">Your Timeline</h3>
    @elseif($key=='blockedthreads')
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">Blocked Threads By Admin</h3>
    @elseif($key=='newsfeed')
        <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">NewsFeed</h3>
        <form action="{{ route('filterNewsFeedThreads') }}" method="get">
        <table>
            <tr>
                <td>
                    <select name="filter_key" class="form-control" style="width: 235px;margin-right: 10px">
                        <option value="all">All Post</option>
                        <option value="favourite">Favourite Post</option>
                        <option value="Admin">Admin Post</option>
                        <option value="Student">Student Post</option>
                        <option value="Teacher">Teacher Post</option>
                        <option value="Alumni">Alumni Post</option>
                    </select>
                </td>
                <td>
                    <button style="width: 100px;background-color: #197557;color: #fff;" class="btn" type="submit" name="filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </td>
            </tr>
        </table>
        </form>
        <br>
    @endif
    <br>
    @foreach($threads as $res)
        <div>
            @php
                $user=\App\User::find($res->user_id);
                $like=\App\Likes::where('thread_id','=',$res->id)
                    ->where('user_id','=',\Illuminate\Support\Facades\Auth::id())->get();
                $totalLikes=\App\Likes::where('thread_id','=',$res->id)->where('like_dislike','=',1)->get()->count("id");
                $totalDislikes=\App\Likes::where('thread_id','=',$res->id)->where('like_dislike','=',2)->get()->count("id");
                $totalCom=\App\Comments::where('thread_id','=',$res->id)->get()->count("id");
            @endphp
            <p style="font-weight: 600;">
                <i style="color: #4e4e4e;" class="glyphicon glyphicon-user"></i> <span style="font-weight: 600;color: #4e4e4e;"> {{ $user->user_type }} : {{ $user->name }}</span>
                <span style="float: right;color: #0a8e63;"><i style="color: #0a8e63;" class="glyphicon glyphicon-time"></i> Posted At :{{ $res->created_at }}</span></p>

            <p style="font-weight: 600;"><i style="color: #0a8e63;" class="glyphicon glyphicon-globe"></i> <span style="color: #0a8e63;font-weight: bold;"> {{ $res->category}} </span>
            @if($user_type=='Admin')
                @if($res->is_favourite==1)
                    <a href="{{ route('makeFavourite',$res->id) }}" style="float: right;color: #0a8e63;text-decoration: none;cursor: pointer;"><i class="glyphicon glyphicon-star"></i> Favourite (or click to un-favourite)</a>
                @else
                    <a href="{{ route('makeFavourite',$res->id) }}" style="float: right;color: #4e4e4e;text-decoration: none;cursor: pointer;"><i class="glyphicon glyphicon-star"></i> Mark As Favourite</a>
                @endif

                @if($res->is_delete==1)
                    <a href="{{ route('makeBlock',$res->id) }}" style="display: inline-block;color: red;text-decoration: none;cursor: pointer;margin-right: 25px;float: right;"><i class="glyphicon glyphicon-alert"></i> Blocked (or click to un-block)</a>
                @else
                    <a href="{{ route('makeBlock',$res->id) }}" style="display: inline-block;color: #4e4e4e;text-decoration: none;cursor: pointer;margin-right: 25px;float: right;"><i class="glyphicon glyphicon-alert"></i> Make As Block</a>
                @endif
            @endif
            </p>
            <a href="{{ route('viewOrAddComment',$res->id) }}" style="color: #4e4e4e;text-decoration: none">{{ $res->details }}</a>
            <div style="margin-top: 10px;font-weight: 600">
                @if(!$like->isEmpty())
                    @if(($like->get(0)->like_dislike)==1)
                        <a href="{{ route('likeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-right: 5px;display: inline-block;vertical-align: top;cursor: pointer;text-decoration: none;color: #0a8e63;"><i class="glyphicon glyphicon-ok-circle"></i> <span> Liked</span></a>
                        <a href="{{ route('viewLikedUser',[$res->id,1]) }}" style="display: inline-block;vertical-align: top;cursor: pointer;text-decoration: none;color: #0a8e63"><span> (You and {{ $totalLikes-1 }} others)</span></a>
                        <a href="{{ route('dislikeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-left: 35px;;margin-right: 5px;;color:#4e4e4e;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;"><i class="glyphicon glyphicon-remove-circle"></i> <span> Dislike</span></a>
                        <a href="{{ route('viewLikedUser',[$res->id,2]) }}" style="display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;color: #4e4e4e;"><span> ({{ $totalDislikes }})</span></a>
                    @elseif(($like->get(0)->like_dislike)==2)
                        <a href="{{ route('likeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-right: 5px;;color:#4e4e4e;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;"><i class="glyphicon glyphicon-ok-circle"></i> <span> Like</span></a>
                        <a href="{{ route('viewLikedUser',[$res->id,1]) }}" style="display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;color: #4e4e4e;"><span> ({{ $totalLikes }})</span></a>
                        <a href="{{ route('dislikeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-left: 35px;;margin-right: 5px;display: inline-block;vertical-align: top;cursor: pointer;text-decoration: none;color: #0a8e63;"><i class="glyphicon glyphicon-remove-circle"></i> <span> Disliked</span></a>
                        <a href="{{ route('viewLikedUser',[$res->id,2]) }}" style="display: inline-block;vertical-align: top;cursor: pointer;text-decoration: none;color: #0a8e63"><span> (You and {{ $totalDislikes-1 }} others)</span></a>
                    @endif
                @else
                    <a href="{{ route('likeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-right: 5px;;color:#4e4e4e;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;"><i class="glyphicon glyphicon-ok-circle"></i> <span> Like</span></a>
                    <a href="{{ route('viewLikedUser',[$res->id,1]) }}" style="display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;color: #4e4e4e;"><span> ({{ $totalLikes }})</span></a>
                    <a href="{{ route('dislikeThread',[$res->id,\Illuminate\Support\Facades\Auth::id()]) }}" style="margin-left: 35px;;margin-right: 5px;;color:#4e4e4e;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;"><i class="glyphicon glyphicon-remove-circle"></i> <span> Dislike</span></a>
                    <a href="{{ route('viewLikedUser',[$res->id,2]) }}" style="display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;color: #4e4e4e;"><span> ({{ $totalDislikes }})</span></a>
                @endif
                @if($totalCom>0)
                    <a href="{{ route('viewOrAddComment',$res->id) }}" style="margin-left: 50px;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;color:#0a8e63"><i style="margin-top: 2px;" class="glyphicon glyphicon-comment"></i> <span style="vertical-align: top;"> Total Comments ({{ $totalCom }})</span></a>
                @else
                    <a href="{{ route('viewOrAddComment',$res->id) }}" style="color:#4e4e4e;margin-left: 50px;display: inline-block;vertical-align: middle;cursor: pointer;text-decoration: none;"><i style="margin-top: 2px;" class="glyphicon glyphicon-comment"></i> <span style="vertical-align: top;"> No Comments</span></a>
                @endif
            </div>
            <hr>
        </div>
    @endforeach
</div>
<br/>
</body>
</html>