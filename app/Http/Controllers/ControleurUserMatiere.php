<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\Parts;
use App\Models\Matieres;

use App\Models\Seances;
use App\Models\Typeparts;
use App\Models\User;


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

        $parts_cm = Parts::where('id_mat','=',$id)->where('nom','like','CM%')->get();
          $seances_cm = 0;
            foreach($parts_cm as $pcm){
                $seances_cm = Seances::where('id_part','=',$pcm->id)->get();
               
            }
                
            
            $parts_td = Parts::where('id_mat','=',$id)->where('nom','like','TD%')->get();
           // dd($parts_td);
         $seances_td=0;
            foreach($parts_td as $ptd){
                $seances_td = Seances::where('id_part','=',$ptd->id)->get();
            }
            //dd($seances_td);
            $parts_tp = Parts::where('id_mat','=',$id)->where('nom','like','TP%')->get();
            $seances_tp=0;
            foreach($parts_tp as $ptp){
                $seances_tp = Seances::where('id_part','=',$ptp->id)->get();
            }

            $parts_ctd = Parts::where('id_mat','=',$id)->where('nom','like','CTD%')->get();
            $seances_ctd = 0;
            foreach($parts_ctd as $pctd){
                $seances_ctd = Seances::where('id_part','=',$pcm->id)->get();
            }
            

        return View('users.VueMatiere',compact('nom_mat','seances_cm','parts_cm','seances_td','parts_td','seances_tp','parts_tp','seances_ctd','parts_ctd'));
    }
}
