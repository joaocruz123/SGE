<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected  $table = 'alunos';
    protected  $fillable = ['nome','idade','sexo','endereco','telefone'];

    public function matriculas(){
        return $this->hasMany('App\Matriculas');
    }
}
