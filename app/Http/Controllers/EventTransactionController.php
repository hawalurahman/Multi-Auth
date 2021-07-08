<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\EventTransaction;

use Illuminate\Http\Request;

class EventTransactionController extends Controller
{
    public function register($id){
        $event = Event::find($id);
        $user = Auth::user();
            return view('mentalheal.transaction.register',compact('event', 'user'));

    }

    public function processRegister(Request $request){
        $event = Event::find($request->event_id);

        EventTransaction::create($request->all());
        return view('mentalheal.transaction.ticket', compact('request', 'event'));

    }

    public function history(){
        $userId = Auth::id();    
            $transactions = EventTransaction::where('user_id', $userId)->latest()->get();
            return view('mentalheal.transaction.history',compact('transactions', 'userId'));
    }

    public function orders(){
        $userId = Auth::id();
        $eventId = Event::where('id_user', $userId)->get()->map->only(["id"]);
        $n = '';
        if ($eventId->isEmpty()){
            return redirect()->route('dashboard');
            

        } else {

            if (Auth::user()->hasRole('admin')){
                $transactions = EventTransaction::where('status', 0)->latest()->get();
                $i = 0;
                return view('mentalheal.transaction.orders',compact('transactions', 'i'));
    
            } 
                $transactions = EventTransaction::where('status', 0)->where('event_id', $eventId)->get();
                $i = 0;
                return view('mentalheal.transaction.orders',compact('transactions', 'i')); 


        }
        
    }

    public function confirm(Request $request, EventTransaction $transaction){
        $hi = EventTransaction::where('id', $request->id)->update(['status' => true]);
        return back();
    }

    public function transactionList(){
        $userId = Auth::id();
        $i = 0;
        $eventId = Event::where('id_user', $userId)->get()->map->only(["id"]);
        $n = '';
        if ($eventId->isEmpty()){
            return redirect()->route('dashboard');
            

        } else {
            if (Auth::user()->hasRole('admin')){
                $transactions = EventTransaction::latest()->get();
                return view('mentalheal.transaction.list',compact('transactions', 'i'));
            }
                $transactions = EventTransaction::where('event_id', $eventId)->get();
                return view('mentalheal.transaction.list',compact('transactions', 'i'));

        }
        
    }



}