<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\Parts;
use App\Models\Matieres;

use App\Models\Seances;
use App\Models\Typeparts;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
      if(request()->user()->hasRole('admin'))
      {  return view('home');
      }
      elseif(request()->user()->hasRole('user')){
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
           // print_r($y);
          
       // dd($nom_mat);
         
           
      
        return view('users.index',compact('nom_mat'));


    }
   
}


    }

