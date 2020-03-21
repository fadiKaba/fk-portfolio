<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\MessangerEvent;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $request->validate([
        //     'message' => ''
        // ]);
        // $msg = Message::create([
        //     'to' => $request->to,
        //     'from' => $request->from,
        //     'message' => $request->message,
        //     'is_read' => 0
        // ]);
        event(new MessangerEvent('hello world'));
      // return $msg;
    }
    public function clientSearch($val){
        $users = User::where('email', 'LIKE', "%$val%")->get();
        return json_encode($users);
       }
    public function contacts($userId){
        $messages= Message::where('from', $userId)->orWhere('to', $userId)->with('sender')->get();
        return $messages;
    }
    public function getSenderMessages($senderId){
        $msgs = Message::where('from', $senderId)->orWhere('to', $senderId)->with('sender')->get();
        return json_encode($msgs);
    }
}
