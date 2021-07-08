<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('mentalheal.posts.show',compact('user'));
    }

    public function destroy(int $user)
    {

        $target = User::findOrFail($user);
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $target->posts()->delete();
        $target->events()->delete();
        $target->transaction()->delete();
        $target->delete();
        
  
        return back();
    }

    public function contribute(){
        return view('mentalheal.daftarkontributor');
    }

    public function profile(User $user){
        $userId = Auth::id();
        $user = User::where('id', $userId);
        return view('mentalheal.profile', compact('user'));
    }

    public function edit(int $user)
    {   
        $userId = Auth::id();
        $target = User::find($userId);
        return view('mentalheal.editprofile',compact('target', 'userId'));        
    }

    public function update(Request $request, User $user)
    {
        $target = User::find(Auth::id());

       
        $target->update($request->all());
         
        return back();
    }
}
