<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SupportMail;

class MailsController extends Controller
{   
    public function index(){
        return view('contact');
    }

    public function send(Request $request){
        
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $detail = [
            'title' => $request->subject,
            'body'  => $request->message
        ];

        try{
          Mail::to('fadikaba9@gmail.com')->send(new SupportMail($detail));  
        }catch(Exception $err){
            abort(403, 'Unauthorized action.');
            return redirect()->back();
        }
        

    //     if (Mail::failures()) {
    //         return response()->w('Sorry! Please try again latter');
    //    }else{
    //         return response()->success('Great! Successfully send in your mail');
    //       }
    }
}
