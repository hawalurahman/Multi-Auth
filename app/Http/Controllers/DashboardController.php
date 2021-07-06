<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            return view('mentalheal.landing');
        } elseif(Auth::user()->hasRole('contributor')) {
            $postCount = DB::table('posts')->count();
            return view('mentalheal.contributor.dashboard', compact('postCount'));
        } elseif(Auth::user()->hasRole('admin')) {
            $postCount = DB::table('posts')->count();
            $userCount = DB::table('users')->count();
            return view('mentalheal.admin.dashboard', compact('postCount', 'userCount'));
        }
    }

    public function feeds(){
        return view('mentalheal.landing');
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