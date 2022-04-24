<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteEstado
 * @package App\Models
 * @version October 27, 2021, 10:19 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 * @property string $siglas
 */
class ParteEstado extends Model
{
    use SoftDeletes;

    public $table = 'parte_estados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    const TEMPORAL =            1;
    const INGRESADA =           2;
    const ENVIADA_ADMICION =    3;
    const LISTA_ESPERA =        4;
    const PROGRAMADO =          5;
    const SUSPENDIDO =          6;
    const ACTIVACION =          7;
    const ELIMINADO =           8;
    const OPERADO =           21;
    const POR_ACTIVAR =           22;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'siglas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'siglas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'siglas' => 'nullable|string|max:3',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'estado_id');
    }

    public function scopeParaAdmision($q)
    {
        $q->whereNotIn('id',[self::TEMPORAL,self::INGRESADA,self::ENVIADA_ADMICION,self::LISTA_ESPERA]);
    }
}
