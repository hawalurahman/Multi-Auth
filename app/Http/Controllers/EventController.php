<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('user')){

            $events = Event::latest()->paginate(10);
            return view('mentalheal.feeds',compact('events'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
            
        } elseif(Auth::user()->hasRole('contributor')) {
            
            $userId = Auth::id();    
            $posts = Post::where('id_user', $userId)->paginate(10);
            return view('mentalheal.posts.index',compact('posts', 'userId'))
                ->with('i', (request()->input('page', 1) - 1) * 10);

        } elseif(Auth::user()->hasRole('admin')) {

            $posts = Post::latest()->paginate(10);
            return view('mentalheal.posts.index',compact('posts'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        
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
    public function show(Event $event)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
