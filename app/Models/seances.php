<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seances extends Model
{
    use HasFactory;

    public function parts(){
        return $this->BelongsTo('App\Models\Parts','id_ens') ;
    }
}
