<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteInsumoEspecifico
 * @package App\Models
 * @version June 3, 2022, 2:05 am -04
 *
 * @property \App\Models\Parte $parte
 * @property \App\Models\InsumoEspecifico $insumo
 * @property integer $parte_id
 * @property integer $insumo_id
 * @property integer $cantidad
 */
class ParteInsumoEspecifico extends Model
{
    use SoftDeletes;

    public $table = 'parte_insumo_especificos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parte_id',
        'insumo_id',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parte_id' => 'integer',
        'insumo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parte_id' => 'required',
        'insumo_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function insumo()
    {
        return $this->belongsTo(\App\Models\InsumoEspecifico::class, 'insumo_id');
    }
}
