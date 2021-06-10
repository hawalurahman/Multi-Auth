<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            return view('UserDashboard');
        } elseif(Auth::user()->hasRole('contributor')) {
            return view('mentalheal.contributor');
        } elseif(Auth::user()->hasRole('admin')) {
            $postCount = DB::table('posts')->count();
            $userCount = DB::table('users')->count();
            return view('mentalheal.admin.dashboard', compact('postCount', 'userCount'));
        }
    }

    public function posts(){
        $posts = Post::latest();
        return view('mentalheal.admin.posts');
    }

    public function profile(){
        return view('profile');
    }

    public function createpost(){
        return view('createpost');
    }
}
