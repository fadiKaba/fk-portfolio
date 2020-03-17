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
          if (Mail::failures()) {
            return redirect()->back()->withErrors('Sorry! We could not send your email, Please try again latter');
       }else{
            return redirect()->back()->with('success','Successfully send in your mail');
          }
        }catch(Exception $err){
            abort(403, 'Unauthorized action.');
            return redirect()->back();
        }
        

        
    }
}
