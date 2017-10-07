<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    public function chamadas(){
        return $this->BelongsTo('App\Chamada', 'chamada_id', 'id');
    }
}
