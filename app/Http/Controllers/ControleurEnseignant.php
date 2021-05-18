<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\User;
use App\Models\User_enseignants;


class ControleurEnseignant extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(){
        $enseignants = Enseignants::all();
        $userlists = User::all();
        $roles = array();
        $x=array();
         foreach ($enseignants as $list){
             $x[]=Enseignants::find($list->id)->users->each(function($r)
             {
                 
             return $r->nom;
             
 
             });  
         }
         foreach($x as $y){
             foreach($y as $z){
                 $roles[]=$z->id;
             }
         } 
         
        
        return view('enseignants',compact('enseignants','roles','userlists'));
    }
    public function store(){
        $nom = request('name');
        $nomens = request('user_name');
        $enseignants = new Enseignants();
        $enseignants->nom = $nom;
        $enseignants->save();
        $user_enseignants = new User_enseignants();
        $user_infos = User::where('name','=',$nomens)->get();
        $ens_infos = Enseignants::where('nom','=',$nom)->get();

     
      $user_id=0;
        foreach($ens_infos as $u){
            $ens_id=($u->id);
        }
        foreach($user_infos as $u){
            $user_id=($u->id);
        }
       $user_enseignants->id_user=$user_id;
        $user_enseignants->id_ens=$ens_id;
        $user_enseignants->save();

           return back();

    }
}
