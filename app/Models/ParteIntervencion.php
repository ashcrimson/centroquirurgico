<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteIntervencion
 * @package App\Models
 * @version October 22, 2021, 11:34 am CST
 *
 * @property \App\Models\Intervencione $intervencion
 * @property \App\Models\Parte $parte
 * @property integer $parte_id
 * @property integer $intervencion_id
 * @property string $lateralidad
 */
class ParteIntervencion extends Model
{
    use SoftDeletes;

    public $table = 'parte_intervenciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parte_id',
        'intervencion_id',
        'lateralidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parte_id' => 'integer',
        'intervencion_id' => 'integer',
        'lateralidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parte_id' => 'required',
        'intervencion_id' => 'required',
        'lateralidad' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function intervencion()
    {
        return $this->belongsTo(\App\Models\Intervencione::class, 'intervencion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }
}
