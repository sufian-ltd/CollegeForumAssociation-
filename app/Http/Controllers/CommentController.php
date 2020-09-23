<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOrAddComment($threadid)
    {
        $thread=Thread::find($threadid);
        $user=User::find($thread->user_id);
        $comments=Comments::where('thread_id','=',$threadid)->get();
        return view('view-or-add-comment')->with('thread',$thread)
            ->with('user',$user)->with('comments',$comments);
    }

    public function addComment($threadid,Request $request)
    {
        $comment=new Comments();
        $comment->thread_id=$threadid;
        $comment->user_id=Auth::id();
        $comment->details=$request->details;
        $comment->save();
        return $this->viewOrAddComment($threadid);
    }

    public function removeComment($id,$threadid)
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $comment = Comments::find($id);
            $comment->delete();
            return $this->viewOrAddComment($threadid);
        }
    }
}
