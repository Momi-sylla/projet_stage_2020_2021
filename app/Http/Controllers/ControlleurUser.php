<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;



class ControlleurUser extends Controller
{

    public function __construct(){
       $this->middleware('auth');
       $this->middleware('role:admin');
       
    }
    public function index(){
        $userlists = User::all();
       $roles = array();
       $x=array();
        foreach ($userlists as $list){
            $x[]=User::find($list->id)->roles->each(function($r)
            {
                
            return $r->name;
            

            });  
        }
        foreach($x as $y){
            foreach($y as $z){
                $roles[]=$z->name;
            }
        } 
         
          //  print_r($userlists);
          // print_r($roles);
        return view('VueUser',compact('userlists','roles'));
    }


    public function store(){
        $nom = request('name');
        $email = request('email');
        $pass = request('password');
        $role = request('role_id');
       
        $user = new User();
        $user->name = $nom;
        $user->email = $email;
        $user->password = hash::make($pass);
        $user->save();
        $user->attachRole($role);
        
                return back()->with('success', 'Utilisateur Créé Avec Succès');

        
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

        return redirect()->route('index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function delete(){
        $id =request('valeurusersup');
      //  dd($id);
        $user= User::find($id);
        $user->delete();
        return redirect()->route('index')->with('success', 'utilisateur supprimé avec succès');
    }
    


}
