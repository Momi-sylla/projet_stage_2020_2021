<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\Parts;
use App\Models\Matieres;

use App\Models\Seances;
use App\Models\Typeparts;
use App\Models\User;
use App\Models\Salles;
use App\Models\Salles_seances;
use App\Models\Typecontraintes;
use App\Models\Contraintesseances;
use Illuminate\Support\Facades\DB;



class ControleurUserMatiere extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:user');

    }

    public function userindex($id){
        $user_id = request()->user()->id;
        $enseignants = Enseignants::all();
        $x=array();
          $x=User::find($user_id)->enseignants->each(function($r){
                    return $r->nom;
          });
         
          foreach($x as $y){
              $ens_id=$y->id;
          }



        $nom_mat=Matieres::where('id_ens','=',$ens_id)->get();
          $salle_se = array() ;
          $cont =array();
          $typecontseance = array();
        $parts_cm = Parts::where('id_mat','=',$id)->where('nom','like','CM%')->get();
          $seances_cm = array();
            foreach($parts_cm as $pcm){
                $seances_cm = Seances::where('id_part','=',$pcm->id)->get();
                if(gettype($seances_cm)=='object'){
                   
                    $x = array();
                    foreach($seances_cm as $scm){
                        $x [] = Seances::find($scm->id)->salles->toArray();

                        $typecontseance [] = DB::table('seances')->join('contraintesseances', 'seances.id', '=', 'contraintesseances.id_seance')
                        ->join('typecontraintes','contraintesseances.type','=','typecontraintes.id')
                        ->where('seances.id','=',$scm->id)
                        ->select('contraintesseances.arguments','typecontraintes.nom')->get();

                    }

                   
                
                    
                    $salle_se=$x;
                
                    
                 //   dd($typecontseance);

                  
                   
                }
               
            }
                
            
            $parts_td = Parts::where('id_mat','=',$id)->where('nom','like','TD%')->get();
           // dd($parts_td);
         $seances_td=0;
        $salle_td = array();
            foreach($parts_td as $ptd){
                $seances_td = Seances::where('id_part','=',$ptd->id)->get();
                if(gettype($seances_td)=='object'){
                   
                    $x = array();
                    foreach($seances_td as $std){
                        $x [] = Seances::find($std->id)->salles->toArray();
                    

                    }
                    $salle_td=$x;
                    }
                       
            }
            //dd($seances_td);
            $parts_tp = Parts::where('id_mat','=',$id)->where('nom','like','TP%')->get();
            $seances_tp=0;
            $salle_tp= array();
            foreach($parts_tp as $ptp){
                $seances_tp = Seances::where('id_part','=',$ptp->id)->get();
                if(gettype($seances_tp)=='object'){
                    
                    $x = array();
                    foreach($seances_tp as $stp){
                      $x [] = Seances::find($stp->id)->salles->toArray();

                    }
                    $salle_tp=$x;
                }
            }
           

            $parts_ctd = Parts::where('id_mat','=',$id)->where('nom','like','CTD%')->get();
            $seances_ctd = 0;
            $salle_ctd =array();
            foreach($parts_ctd as $pctd){
                $seances_ctd = Seances::where('id_part','=',$pctd->id)->get();
                if(gettype($seances_ctd)=='object'){
                   
                    $x = array();
                    foreach($seances_ctd as $sctd){
                        $x [] = Seances::find($sctd->id)->salles->toArray();
                    }
                    $salle_ctd=$x;
                    }
            }
            $salles = Salles::get();
         
            $typecontraintes = Typecontraintes::all();
           // dd($typecontraintes);


        return View('users.VueMatiere',compact('nom_mat','seances_cm','parts_cm','seances_td','parts_td','seances_tp','parts_tp','seances_ctd','parts_ctd','salles','salle_se','salle_td','salle_tp','salle_ctd','typecontraintes','typecontseance'));
    }

    public function editseancesalle(){
        $salles = request('namesalle');
        $seance = request('nameseance');
       foreach($salles as $salle){
        $salle_id = Salles::where('nom','=',$salle)->get();
       // dd($salle_id[0]->id);
        //dd($salle);
        $salles_seance = new Salles_seances();
        $salles_seance->id_salle=$salle_id[0]->id;
        $salles_seance->id_seance = $seance;
        $salles_seance->save();
        
       }
       return back();
    }

    public function ajoutcontrainte(){
        $id_seance = (int)request('constraint');
        $type = request('typeconstr');
        $type_id = Typecontraintes::where('nom','=',$type)->get();
    //    dd($type_id);
        $arg = request('argument');
      //  dd($arg);
      $contrainte = new Contraintesseances();
      $contrainte->id_seance = $id_seance;
      $contrainte->type = $type_id[0]->id;
      $contrainte->arguments = $arg;
      $contrainte->save();
        return back();
    }
}
