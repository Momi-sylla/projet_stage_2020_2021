<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\User;
use App\Models\User_enseignants;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;




class ControleurEnseignant extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function indexEnseignants(){
       
        $userlists = User::all();
     
        $enseignants [] =DB::table('users')->join('user_enseignants', 'users.id', '=', 'user_enseignants.id_user')
                        ->join('enseignants','user_enseignants.id_ens','=','enseignants.id')
                        ->select('enseignants.nom AS nom_ens','enseignants.id','users.id AS id_user',)->get();
                    //   dd($enseignants[0]);
        
        
        return view('enseignants',compact('enseignants','userlists'));
    }
    public function storeEnseignants(){
        $nom = request('name');
        $nomens = request('user_name');
        try{
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

           return back()->with('success', 'enseignant ajouté Avec Succès');
        }
        catch(QueryException $ex){
 
         return back()->with('fail', 'Oups! l\'enseignant existe déja');
        }     

    }
    public function deletecontr(){
        $valeursup = (int) request('valeursup');
       // dd($valeursup);
       try{
       DB::delete('delete from enseignants where id = ?',[$valeursup]);
       return back()->with('success', 'Suppression effectuée Avec Succès');
    }
    catch(QueryException $ex){

     return back()->with('fail', 'Oups! l\'enseignant existe déja');
    }     
    }
}
