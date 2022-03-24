<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteExamen
 * @package App\Models
 * @version November 19, 2021, 9:51 pm CST
 *
 * @property \App\Models\Examen $examen
 * @property \App\Models\Parte $parte
 * @property integer $parte_id
 * @property integer $examen_id
 * @property Carbon $fecha_realiza
 */
class ParteExamen extends Model
{
    use SoftDeletes;

    public $table = 'parte_examenes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['fecha_realiza_ltn'];


    public $fillable = [
        'parte_id',
        'examen_id',
        'fecha_realiza'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parte_id' => 'integer',
        'examen_id' => 'integer',
        'fecha_realiza' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parte_id' => 'required',
        'examen_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function examen()
    {
        return $this->belongsTo(\App\Models\Examen::class, 'examen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }

    public function getFechaRealizaLtnAttribute()
    {
        return $this->fecha_realiza->format('d/m/Y');
    }
}
