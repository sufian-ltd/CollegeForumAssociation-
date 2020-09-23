<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newThread()
    {
        $threads=Thread::all();
        return view('new-thread')->with('threads',$threads);
    }

    public function saveNewThread(Request $request)
    {
        $thread=new Thread();
        $thread->user_id=Auth::id();
        $thread->category=$request->category;
        $thread->details=$request->details;
        $thread->date=Date::now();
        if((Auth::user()->user_type)=='Admin')
            $thread->is_approved=1;
        else
            $thread->is_approved=0;
        $thread->is_delete=0;
        $thread->is_favourite=0;
        $thread->creator_type=Auth::user()->user_type;
        $thread->save();
        return redirect()->route('adminViewThreads');
    }

    public function adminViewThreads()
    {
        $key='newsfeed';
        $threads=Thread::where('is_approved','=','1')->where('is_delete','=','0')->get();
        return view('admin-view-threads')->with('threads',$threads)
            ->with('key',$key);
    }

    public function filterNewsFeedThreads(Request $request)
    {
        $key='newsfeed';
        if(($request->filter_key)=='favourite')
            return $this->adminViewFavouriteThreads();
        elseif (($request->filter_key)=='all')
            return $this->adminViewThreads();
        else {
            $threads = Thread::where('is_approved', '=', '1')
                ->where('is_delete', '=', '0')
                ->where('creator_type', '=', $request->filter_key)->get();
            return view('admin-view-threads')->with('threads', $threads)->with('key', $key);
        }
    }

    public function timelineThreads()
    {
        $key='timeline';
        $threads=Thread::where('is_approved','=','1')->where('is_delete','=','0')
            ->where('user_id','=',Auth::id())->get();
        return view('admin-view-threads')->with('threads',$threads)->with('key',$key);
    }

    public function adminViewThreadsRequest()
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $key = 'requestthreads';
            $threads = Thread::where('is_approved', '=', '0')->get();
            return view('admin-view-threads-request')->with('threads', $threads)->with('key', $key);
        }
    }

    public function adminViewBlockedThreads()
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $key = 'blockedthreads';
            $threads = Thread::where('is_delete', '=', '1')->get();
            return view('admin-view-threads')->with('threads', $threads)->with('key', $key);
        }
    }

    public function adminViewFavouriteThreads()
    {
        $key='newsfeed';
        $threads=Thread::where('is_favourite','=','1')->get();
        return view('admin-view-threads')->with('threads',$threads)->with('key',$key);
    }

    public function approveThread($id)
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $thread = Thread::find($id);
            $thread->is_approved = 1;
            $thread->save();
            return $this->adminViewThreadsRequest();
        }
    }

    public function rejectThread($id)
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $thread = Thread::find($id);
            $thread->delete();
            return $this->adminViewThreadsRequest();
        }
    }

    public function makeFavourite($id){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $thread = Thread::find($id);
            if ($thread->is_favourite == 0)
                $thread->is_favourite = 1;
            else
                $thread->is_favourite = 0;
            $thread->save();
            return redirect()->route('adminViewThreads');
        }
    }

    public function makeBlock($id){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $thread = Thread::find($id);
            if ($thread->is_delete == 0)
                $thread->is_delete = 1;
            else
                $thread->is_delete = 0;
            $thread->save();
            return $this->adminViewBlockedThreads();
        }
    }
}
