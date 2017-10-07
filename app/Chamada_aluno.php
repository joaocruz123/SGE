<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamada_aluno extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chamada_alunos';

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
    protected $fillable = ['aluno_id', 'presenca', 'chamada_id', 'visitantes','biblias', 'revistas'];

    public function chamadas(){
        $this->belongsToMany('App\Chamada');
    }
}
