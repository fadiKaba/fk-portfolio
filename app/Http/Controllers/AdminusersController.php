<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

class AdminusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('/admin/admin-users')->with(compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $newUser = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|unique:users,email|email',
        'password' => 'required|min:8',
        'role' => 'required|integer'
    ]);
        $hashp = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashp,
            'is_admin' => $request->role
        ]);
        return redirect()->back()
        ->with('success',$request->name . ' ' . $request->email . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $user = User::findOrfail($id);

        $request->validate([
            'name' => 'required|min:3',           
            'role' => 'required|integer'
        ]);
        if($request->email != $user->email){
            $request->validate(['email' => 'required|email']);
        }
        if($request->password != ''){
            $request->validate(['password' => 'min:8']);
            $hashu = Hash::make($request->password);
            $user->password = $hashu;
        }
       
       $user->name = $request->name;
       $user->email = $request->email;
       $user->is_admin = $request->role;
       $user->save();
       return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->back()->with('success',$user->name . ' ' .$user->email. " deleted successfully");
    }
    public function search(Request $val)
    {
        $users = User::all();
        $search = User::where('email', 'Like', "%$val->val%")->orWhere('name', 'Like', "%$val->val%")->get();
        return $search; 
    }
}
