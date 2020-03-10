<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use File;

class ProfilesController extends Controller
{
    public function show(){
        if(Auth::check()){
            $userAuth = User::findOrFail(Auth::id());
            return view('profile')->with(compact('userAuth'));
        }
        return "error";
    }
    public function update(Request $request, $id){
        
        $request->validate([
            'name' => 'required|min:3',
            'img' => 'image|max:2000'
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
        ]);       
        if($request->file('img') != null){
            if(File::exists(public_path('/photos/'.$user->src))){
                File::delete(public_path('/photos/'.$user->src));
            }
            $imgName =  $id .'pr' . time().'.'.$request->img->extension();
            $request->img->move(public_path('photos'), $imgName);
            $user->update([
                'src' => $imgName,
            ]);           
        }
        
        return \redirect()->back()->with('success', 'Saved');
    }
    public function delPhoto($id){

        $user = User::findOrFail($id);
        if(File::exists(public_path('/photos/'.$user->src))){
            File::delete(public_path('/photos/'.$user->src));
        }
        $user->update([
            'src' => ''
        ]);
        
        return redirect()->back()->with('success', 'Photo deleted successfully');
    }
}
