<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\Parts;
use App\Models\Seances;
use App\Models\Typeparts;

use App\Models\Matieres;
use Illuminate\Support\Facades\DB;

class ControleurMatiere extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }



    public function indexMatieres(){
       $matieres = Matieres::all();
        $enseignants = Enseignants::all();
       $ens_name = array();
     
        foreach ($matieres as $list){
           $ens_name[]= Matieres::find($list->id)->enseignants->nom;
        }
       
        return view('matiere',compact('matieres','enseignants','ens_name'));
    }

public function storeMatieres(){
        $nom = request('name');
        $nomens = request('ens_name');
     
       $matieres = new Matieres();
        $matieres->nom = $nom;
        
      //  $user_infos = Enseignants::where('nom','=',$nomens)->get();
        $ens_infos = Enseignants::where('nom','=',$nomens)->get();
     
      $ens_id=0;
        foreach($ens_infos as $u){
            $ens_id=($u->id);
        }
       $matieres->id_ens=$ens_id;
        $matieres->save();
           return back()->with('success', 'Matière enregistrée Avec Succès');
    }



    public function show($id){
        $matiere = Matieres::find($id);

        $idpart = 0;
        $cm_infos= Parts::where('nom','=','CM')->where('id_mat','=',$id)->get();
        foreach($cm_infos as $infos){
            $idpart = $infos->id;
        }

       
      
       $infos_seances_cm = Seances::where('id_part','=',$idpart)->get();
       $cpt_cm= count($infos_seances_cm);

       $idpart = 0;
       $td_infos= Parts::where('nom','=','TD')->where('id_mat','=',$id)->get();
       foreach($td_infos as $infos){
           $idpart = $infos->id;
       }
     
      $infos_seances_td = Seances::where('id_part','=',$idpart)->get();
      $cpt_td= count($infos_seances_td);

      $idpart = 0;
      $tp_infos= Parts::where('nom','=','TP')->where('id_mat','=',$id)->get();
      foreach($tp_infos as $infos){
          $idpart = $infos->id;
      }
    
     $infos_seances_tp = Seances::where('id_part','=',$idpart)->get();
     $cpt_tp= count($infos_seances_tp);
     
     $idpart = 0;
     $ctd_infos= Parts::where('nom','=','CTD')->where('id_mat','=',$id)->get();
     foreach($ctd_infos as $infos){
         $idpart = $infos->id;
     }

    $infos_seances_ctd = Seances::where('id_part','=',$idpart)->get();
    $cpt_ctd= count($infos_seances_ctd);
    $bool = false;
     if($cpt_cm>0 || $cpt_td>0 || $cpt_tp>0 || $cpt_ctd>0 ){
         $bool = true;
     }

        
        return view('VueMatiere',compact('matiere','cpt_cm','cpt_td','cpt_tp','cpt_ctd','bool'));
    }

   
   
   
    public function storeseances(){
        $typeparts = Typeparts::all();
        $cm = (int) request('nb_cm');
        $td = (int) request('nb_td');
        $tp = (int) request('nb_tp');
        $ctd = (int) request('nb_ctd');
        
        try{ 

        $infos_cm=Typeparts::Where('nom','=','CM')->get();
        foreach($infos_cm as $infos){
            $id_cm = $infos->id;
            $nom_cm = $infos->nom;
        }
        $infos_cm=Typeparts::Where('nom','=','TD')->get();
        foreach($infos_cm as $infos){
            $id_td = $infos->id;
            $nom_td = $infos->nom;
        }

        $infos_cm=Typeparts::Where('nom','=','TP')->get();
        foreach($infos_cm as $infos){
            $id_tp = $infos->id;
            $nom_tp = $infos->nom;
        }

        $infos_ctd=Typeparts::Where('nom','=','CTD')->get();
        foreach($infos_ctd as $infos){
            $id_ctd = $infos->id;
            $nom_ctd = $infos->nom;
        }
      //  dd($id_cm);


        if($cm>0){
            $parts = new Parts();
            $parts->nom = $nom_cm;
            $parts->type_part = $id_cm;
            $parts->id_mat = request('id_mat');
            $parts->nb_ens = 1;
            $parts->nb_salle = 1;
            $parts->save();
            for($i=0 ; $i<$cm;$i++){
                $seance = new Seances();  
                $seance->id_part = $parts->id;
                $seance->save();
            }

        }
        if($td>0){
            $parts = new Parts();
            $parts->nom = $nom_td;
            $parts->type_part = $id_td;
            $parts->id_mat = request('id_mat');
            $parts->nb_ens = 1;
            $parts->nb_salle = 1;
            $parts->save();
            for($i=0 ; $i<$td;$i++){
                $seance = new Seances();  
                $seance->id_part = $parts->id;
                $seance->save();

            }
        }
        if($tp>0){
            $parts = new Parts();
            $parts->nom = $nom_tp;
            $parts->type_part = $id_tp;
            $parts->id_mat = request('id_mat');
            $parts->nb_ens = 1;
            $parts->nb_salle = 1;
            $parts->save();
            for($i=0 ; $i<$tp;$i++){
            $seance = new Seances();
            $seance->id_part = $parts->id;
            $seance->save();

        }
        }
        if($ctd>0){
            $parts = new Parts();
            $parts->nom = $nom_ctd;
            $parts->type_part = $id_ctd;
            $parts->id_mat = request('id_mat');
            $parts->nb_ens = 1;
            $parts->nb_salle = 1;
            $parts->save();
            for($i=0 ; $i<$ctd;$i++){
            $seance = new Seances();
            $seance->id_part = $parts->id;
                            $seance->save();

            }
        }
 
        return back();
        }
    
catch(QueryException $ex){
    return back()->with('fail', 'Oups! une erreur est survenue !');

}
    }
}