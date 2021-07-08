<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Event;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            return view('mentalheal.landing');
        } elseif(Auth::user()->hasRole('contributor')) {
            $user = Auth::user();
            $postCount = $user->posts()->count();
            $eventCount = $user->events()->count();
            return view('mentalheal.contributor.dashboard', compact('postCount','eventCount'));
        } elseif(Auth::user()->hasRole('admin')) {
            $postCount = DB::table('posts')->count();
            $userCount = DB::table('users')->count();
            $eventCount = DB::table('events')->count();
            $transactionCount = DB::table('event_transactions')->count();
            return view('mentalheal.admin.dashboard', compact('postCount', 'userCount', 'eventCount'));
        }
    }

    public function users(){
        // $users = User::latest()->paginate(10);
        $i = 0;
        $users = User::whereHas('roles', function($q)
            {   
                $q->where('name', 'user');
            })->get();
            return view('mentalheal.admin.user',compact('users', 'i'));

    }

    public function contributors(){
        $i=0;
        $users = User::whereHas('roles', function($q)
            {   
                $q->where('name', 'contributor');
            })->get();
            return view('mentalheal.admin.contributors',compact('users','i'));

    }

    public function admins(){
        $i=0;
        $users = User::whereHas('roles', function($q)
            {   
                $q->where('name', 'admin');
            })->get();
            return view('mentalheal.admin.listadmin',compact('users','i'));

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

    public function cekrole(){
        $user = Auth::user()->hasRole('contributor');
        dd($user);
    }
}