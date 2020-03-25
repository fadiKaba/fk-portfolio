<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SupportMail;
use Auth;

class MailsController extends Controller
{   
    public function index(){
        $page = 'contact';
        return view('contact')->with('page', 'contact');
    }

    public function send(Request $request){
        
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $detail = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
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
