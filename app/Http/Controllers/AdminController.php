<?php

namespace App\Http\Controllers;

use App\User;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user()
    {
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $user = User::all();
            return view('users')->with('user', $user);
        }
    }

    public function approveUser($id){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $user = User::find($id);
            $user->is_approved = 1;
            $user->save();
            return $this->user();
        }
    }

    public function rejectUser($id){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $user = User::find($id);
            $user->delete();
            return $this->user();
        }
    }

    public function editUser($id){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $user = User::find($id);
            return view('edit-user')->with('user', $user);
        }
    }

    public function saveUserType($id,Request $request){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else {
            $user = User::find($id);
            $user->user_type = $request->user_type;
            $user->save();
            return $this->user();
        }
    }

    public function profile(){
        $user=Auth::user();
        return view('profile')->with('user',$user);
    }

    public function filterUser(Request $request){
        $user_type=Auth::user();
        if(($user_type->user_type)!='Admin')
            return redirect()->route('home');
        else if(($request->user_type)=='all'){
            $user = User::all();
            return view('users')->with('user', $user);
        }
        else if(($request->user_type)=='approved'){
            $user = User::where('is_approved', '=', 1)->get();
            return view('users')->with('user', $user);
        }
        else if(($request->user_type)=='nonapproved'){
            $user = User::where('is_approved', '=', 0)->get();
            return view('users')->with('user', $user);
        }
        else {
            $user = User::where('user_type', '=', $request->user_type)->get();
            return view('users')->with('user', $user);
        }
    }

    public function updateProfile(Request $request)
    {
        $user=Auth::user();
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('home');
    }
}
