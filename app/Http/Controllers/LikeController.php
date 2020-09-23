<?php

namespace App\Http\Controllers;

use App\Likes;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function likeThread($threadId,$userId)
    {
        $alreadyLike=Likes::where('thread_id','=',$threadId)->where('user_id','=',$userId)->get();
        if(!$alreadyLike->isEmpty()) {
            if (($alreadyLike->get(0)->like_dislike) == 1)
            {
                $like = Likes::find($alreadyLike->get(0)->id);
                $like->delete();
            }
            else if (($alreadyLike->get(0)->like_dislike) == 2)
            {
                $like = Likes::find($alreadyLike->get(0)->id);
                $like->like_dislike=1;
                $like->save();
            }
        }
        else
        {
            $like = new Likes();
            $like->thread_id = $threadId;
            $like->user_id = $userId;
            $like->like_dislike = 1;
            $like->save();
        }
        return redirect()->route('adminViewThreads');
    }

    public function dislikeThread($threadId,$userId)
    {
        $alreadyLike=Likes::where('thread_id','=',$threadId)->where('user_id','=',$userId)->get();
        if(!$alreadyLike->isEmpty()) {
            if (($alreadyLike->get(0)->like_dislike) == 2)
            {
                $like = Likes::find($alreadyLike->get(0)->id);
                $like->delete();
            }
            else if (($alreadyLike->get(0)->like_dislike) == 1)
            {
                $like = Likes::find($alreadyLike->get(0)->id);
                $like->like_dislike=2;
                $like->save();
            }
        }
        else
        {
            $like = new Likes();
            $like->thread_id = $threadId;
            $like->user_id = $userId;
            $like->like_dislike = 2;
            $like->save();
        }
        return redirect()->route('adminViewThreads');
    }

    public function viewLikedUser($threadid,$likedislike){
        $likes=Likes::where('thread_id','=',$threadid)->where('like_dislike','=',$likedislike)->get();
        return view('view-liked-user')->with('likes',$likes)->with('likedislike',$likedislike);
    }
}
