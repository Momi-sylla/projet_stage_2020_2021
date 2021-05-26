<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ControlleurUser extends Controller
{

    public function __construct(){
       $this->middleware('auth');
       $this->middleware('role:admin');
       
    }
    public function index(){
        
       $userlists[] =DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles','role_user.role_id','=','roles.id')
                        ->select('users.name AS nom','users.email','users.id AS num','users.created_at AS date_crea','roles.*')->get();
                      
       //  dd($userlists);
        
        return view('VueUser',compact('userlists'));
    }


    public function store(){
        $nom = request('name');
        $email = request('email');
        $pass = request('password');
        $role = request('role_id');
       try{
        $user = new User();
        $user->name = $nom;
        $user->email = $email;
        $user->password = hash::make($pass);
        $user->save();
        $user->attachRole($role);
        
                return back()->with('success', 'Utilisateur Créé Avec Succès');
       }
       catch(QueryException $ex){

        return back()->with('fail', 'Oups! l\'utilisateur existe déja');
       }
        
    }
    public function edit( $id){
        $user = User::find($id);
        
        return view('EditUser',compact('user'));
    }
    public function update($id)
    {
        try{
        $user = User::find($id);
        $nom = request('name');
        $email = request('email');
        $user->name = $nom;
        $user->email = $email;
        $user->save();
        return redirect()->route('index')->with('success', 'Utilisateur modifié avec succès');
    }
    catch(QueryException $ex){
        return redirect()->route('index')->with('fail', 'Oups! une erreur est survenue !');
    }
}

    public function delete(){
        try{
        $id =request('valeurusersup');
      //  dd($id);
        $user= User::find($id);
        $user->delete();
        return redirect()->route('index')->with('success', 'utilisateur supprimé avec succès');
    }
    catch(QueryException $ex){
        return redirect()->route('index')->with('fail', 'Oups! une erreur est survenue !'); 
    }
    


}
}