<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamada extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chamadas';

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
    protected $fillable = ['datachamada', 'turma_id', 'realizada'];

    public function turma(){

        return $this->belongsTo('App\Turma');
    }
}
