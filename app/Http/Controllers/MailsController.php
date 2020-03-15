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

    public function send(){

        $detail = [
            'title' => "Hello",
            'body'  => "This is the first email"
        ];

        Mail::to('fadikaba9@gmail.com')->send(new SupportMail($detail));

    //     if (Mail::failures()) {
    //         return response()->w('Sorry! Please try again latter');
    //    }else{
    //         return response()->success('Great! Successfully send in your mail');
    //       }
    }
}
