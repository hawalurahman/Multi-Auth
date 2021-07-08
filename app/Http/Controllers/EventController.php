<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

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

            $events = Event::latest()->get();
            return view('mentalheal.events.index',compact('events'));
            
        } elseif(Auth::user()->hasRole('contributor')) {
            
            $userId = Auth::id();    
            $events = Event::where('id_user', $userId)->get();
            $i = 0;
            return view('mentalheal.events.index',compact('events', 'userId', 'i'));

        } elseif(Auth::user()->hasRole('admin')) {

            $events = Event::latest()->get();
            $i = 0;
            return view('mentalheal.events.index',compact('events', 'i'));
        
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
            return view('mentalheal.events.create', compact('userId'));
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
            $response = cloudinary()->upload($request->file('poster')->getRealPath())->getSecurePath();
            
            /// insert setiap request dari form ke dalam database via model
            /// jika menggunakan metode ini, maka nama field dan nama form harus sama
            Event::create([
                'title' => $request->title,
                'content' => $request->content,
                'id_user' => $request->id_user,
                'date' => $request->date,
                'end_date' => $request->end_date,
                'price' => $request->price,
                'poster' => $response
            ]);
            
            /// redirect jika sukses menyimpan data
            return redirect()->route('events.index');

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
        return view('mentalheal.events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (Auth::user()->hasRole('user')){

            return view('mentalheal.landing');

        } else {
            /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
            /// berdasarkan id yang dipilih
            /// href="{{ route('posts.edit',$post->id) }}
            $userId = Auth::id();
            return view('mentalheal.events.edit',compact('event', 'userId'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $event->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('events.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
  
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editposter(Request $request, Event $event)
    {
        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $userId = Auth::id();
        $upload = Event::where('id', $request->id)->update(['poster' => $response]);
        return back();
    }

    public function showcase(){
        $events = Event::latest()->get();
            return view('mentalheal.events.feeds',compact('events'));
    }

    public function show1(int $eventId)
    {   
        $event = Event::find($eventId);
        // dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('mentalheal.events.show',compact('event'));
    }













}