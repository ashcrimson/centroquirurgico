<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteExamen
 * @package App\Models
 * @version November 19, 2021, 9:51 pm CST
 *
 * @property \App\Models\Examene $examen
 * @property \App\Models\Parte $parte
 * @property integer $parte_id
 * @property integer $examen_id
 */
class ParteExamen extends Model
{
    use SoftDeletes;

    public $table = 'parte_examenes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parte_id',
        'examen_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parte_id' => 'integer',
        'examen_id' => 'integer'
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
        return $this->belongsTo(\App\Models\Examene::class, 'examen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }
}
