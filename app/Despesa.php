<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = ['data', 'valor', 'categoria_despesa_id'];


    /**
     * Set to null if empty
     * @param $input
     */
    public function setExpenseCategoryIdAttribute($input)
    {
        $this->attributes['categoria_despesa_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEntryDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('d-m-Y');
        } else {
            $this->attributes['data'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEntryDateAttribute($input)
    {
        $zeroDate = str_replace(['d', 'm', 'Y'], ['00', '00', '0000'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('d-m-Y', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function categoria_despesa()
    {
        return $this->belongsTo(CategoriasDespesa::class, 'categoria_despesa_id');
    }
}
