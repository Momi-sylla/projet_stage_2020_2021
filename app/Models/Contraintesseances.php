<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contraintesseances extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function seances(){
        return $this->belongsTo('App\Models\Seances','id_seance');
    }

}
