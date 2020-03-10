<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfilesController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('profile');
        }
        return "error";
    }
}
