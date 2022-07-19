<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Especialidad
 * @package App\Models
 * @version November 24, 2021, 2:18 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $patologias
 * @property \Illuminate\Database\Eloquent\Collection $subEspecialidades
 * @property \Illuminate\Database\Eloquent\Collection $medicos
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 */
class Especialidad extends Model
{
    use SoftDeletes;

    public $table = 'especialidades';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'codigo_especialidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'codigo_especialidad' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'codigo_especialidad' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function patologias()
    {
        return $this->belongsToMany(\App\Models\GrupoBase::class, 'especialidad_grupo_base', 'grupo_base_id', 'especialidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function medicos()
    {
        return $this->belongsToMany(\App\Models\User::class, 'especialidad_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'especialidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subEspecialidades()
    {
        return $this->hasMany(\App\Models\EspecialidadSub::class, 'especialidad_id', 'id');
    }

}
