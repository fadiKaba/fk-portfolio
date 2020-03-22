<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\MessengerEvent;
use Auth;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'message' => ''
        ]);
        // $msg = Message::create([
        //     'to' => $request->to,
        //     'from' => $request->from,
        //     'message' => $request->message,
        //     'is_read' => 0
        // ]);
        event(new MessengerEvent('hello world'));
      // return $msg;
    }
    public function clientSearch($val){
        $users = User::where('email', 'LIKE', "%$val%")->get();
        return json_encode($users);
       }
    public function contacts(){
      $messages= Message::where('from', Auth::id())->orWhere('to', Auth::id())->with('sender')->with('reciever')->get();
      //  dd($messages);
        return $messages;
    }
    public function getSenderMessages($senderId){
        $msgs = Message::where('from', Auth::id())->where('to', $senderId)->orWhere('from', $senderId)->where('to', Auth::id())->with('sender')->get();
       // dd($msgs);
        return json_encode($msgs);
    }
}
