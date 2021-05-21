<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seances extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function parts(){
        return $this->BelongsTo('App\Models\Parts','id_ens') ;
    }
    public function salles(){
        return $this->belongsToMany('App\Models\Salles','salles_seances','id_seance','id_salle');
        }
}
