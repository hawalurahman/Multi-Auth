<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(){
        return view('welcome');
    }

    public function count(){
        $postCount = Post::table('posts')->count();
        return view('mentalheal.admin', compact('posts'));
    }

    public function showallpost(){
        $writers = Post::find(1);
            $posts = Post::latest()->get();            
            return view('mentalheal.posts.feeds',compact('posts','writers'));
    }

    public function index()
    {
        if(Auth::user()->hasRole('user')){
            $writers = Post::find(1);
            $posts = Post::latest()->get(); 
            $i = 0;           
            return view('mentalheal.feeds',compact('posts','writers', 'i'));
            
        } elseif(Auth::user()->hasRole('contributor')) {
            
            $userId = Auth::id(); 
            $i = 0;   
            $posts = Post::where('id_user', $userId)->get();
            return view('mentalheal.posts.index',compact('posts', 'userId', 'i'));

        } elseif(Auth::user()->hasRole('admin')) {

            $posts = Post::latest()->get();
            $i = 0;
            return view('mentalheal.posts.index',compact('posts', 'i'));
        
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('user')){

            return view('mentalheal.landing');

        } else {
            $userId = Auth::id();
            return view('mentalheal.posts.create', compact('userId'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('user')){

            return view('mentalheal.landing');

        } else {
            
            /// membuat validasi untuk title dan content wajib diisi
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
            
            /// insert setiap request dari form ke dalam database via model
            /// jika menggunakan metode ini, maka nama field dan nama form harus sama
            Post::create($request->all());
            // $post->attachMedia($file); 
            
            /// redirect jika sukses menyimpan data
            return redirect()->route('posts.index');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('mentalheal.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   

        if (Auth::user()->hasRole('user')){

            return view('mentalheal.landing');

        } else {
            /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
            /// berdasarkan id yang dipilih
            /// href="{{ route('posts.edit',$post->id) }}
            $userId = Auth::id();
            return view('mentalheal.posts.edit',compact('post', 'userId'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $post->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();
  
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }

    public function show1(int $postId)
    {   
        $post = Post::find($postId);
        // dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('mentalheal.posts.show',compact('post'));
    }
}