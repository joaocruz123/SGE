<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaDisciplina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'turma_disciplinas';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['turma_id', 'disciplina_id'];

}
