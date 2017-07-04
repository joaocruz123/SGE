<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model {

<<<<<<< HEAD
=======
    protected $dates = ['deleted_at'];

>>>>>>> master
    protected $table    = 'matriculas';

    protected $fillable=['aluno_id' , 'turma_id'];

    public function aluno()
    {
        return $this->hasOne('App\Aluno', 'id', 'aluno_id');
    }


    public function turma()
    {
        return $this->hasOne('App\Turma', 'id', 'turma_id');
    }

}