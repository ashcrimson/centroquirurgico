<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Clasificacion
 * @package App\Models
 * @version October 17, 2021, 9:46 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $cirugiaTipos
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 */
class Clasificacion extends Model
{
    use SoftDeletes;

    public $table = 'clasificaciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cirugiaTipos()
    {
        return $this->belongsToMany(\App\Models\CirugiaTipo::class, 'cirugia_tipo_clasificacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'clasificacion_id');
    }
}
