<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignants extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nom',
       
    ];


    public function users(){
        return $this->belongsToMany('App\Models\User','user_enseignants','id_ens','id_user');
        }
    public function matieres(){
        return $this->hasMany('App\Models\Matieres','id_ens');
    }
}
