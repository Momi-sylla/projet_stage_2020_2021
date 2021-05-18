<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function enseignants(){
        return $this->BelongsTo('App\Models\Enseignants','id_ens') ;
    }
    
}
