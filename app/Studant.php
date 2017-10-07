<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studant extends Model
{
    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }

}
