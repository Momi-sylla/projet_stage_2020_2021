<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function seances(){
        return $this->hasMany('App\Models\Seances','id_ens');
    }
    public function typeparts(){
        return $this->BelongsTo('App\Models\Enseignants','id_ens') ;
    }
}
