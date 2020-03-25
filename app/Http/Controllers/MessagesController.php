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
        $msg = Message::create([
            'to' => $request->to,
            'from' => $request->from,
            'message' => $request->message,
            'is_read' => 0
        ]);
        $message = Message::findOrFail($msg->id);
        $sender = User::findOrFail($message->from);
        event(new MessengerEvent($message, $sender->name, $sender->src));
       return $message;
    }

    public function storeSingleMessage(Request $request){
        $request->validate([
            'message' => ''
        ]);
        $msg = Message::create([
            'to' => $request->to,
            'from' => Auth::id(),
            'message' => $request->message,
            'is_read' => 0
        ]);
        $user = User::findOrFail($msg->to);
       return back()->with('success', 'Your message has been sent successfully to '.$user->name);
    }

    public function clientSearch($val){
        $authId = Auth::id();
        $users = User::where('email', 'LIKE', "%$val%")->where('id', '!=', $authId)->get();
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

    public function makeRead($senderId){
        $messages = Message::where('to', Auth::id())->where('from', $senderId)->get();
        foreach($messages as $message){
            $message->update([
                'is_read' => '1'
            ]);
        }
    }

    public function getSender($senderId){
      $sender = User::findOrFail($senderId);
      return $sender;
    }

    public function destroy($senderId){
       $messages = Message::where('to', Auth::id())->where('from', $senderId)->orWhere('to', $senderId)->where('from', Auth::id())->get();
       foreach($messages as $message){
           if($message->deleted != null){
               $message->delete();
           }else{
               $message->update([
                   'deleted' => Auth::id()
               ]);
           }
       }
       return $senderId;
    }
}
