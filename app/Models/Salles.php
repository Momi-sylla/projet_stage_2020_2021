<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    use HasFactory;

    public function seances(){
        return $this->belongsToMany('App\Models\Seances','salles_seances','id_salle','id_seance');
        }

}
