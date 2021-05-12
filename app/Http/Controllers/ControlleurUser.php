<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ControlleurUser extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $userlists = User::all();


        return view('VueUser',compact('userlists'));
    }


    public function store(){
        $nom = request('name');
        $email = request('email');
        $pass = request('password');
       
        $user = new User();
        $user->name = $nom;
        $user->email = $email;
        $user->password = hash::make($pass);
        $user->save();
                return back();

        
    }
    public function edit( $id){
        $user = User::find($id);
        
        return view('EditUser',compact('user'));
    }
    public function update($id)
    {
        $user = User::find($id);
        $nom = request('name');
        $email = request('email');
        $user->name = $nom;
        $user->email = $email;
        $user->save();

        return redirect()->route('index')->with('success', 'User updated successfully');
    }

    public function delete($id){
        $user= User::find($id);
        $user->delete();
        return redirect()->route('index')->with('success', 'User updated successfully');
    }
    


}
