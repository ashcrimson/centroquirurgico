<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class CirugiaTipo
 * @package App\Models
 * @version October 17, 2021, 9:45 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $clasificaciones
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 */
class CirugiaTipo extends Model
{
    use SoftDeletes;

    public $table = 'cirugia_tipos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const MAYOR =      1;
    const MENOR =      2;
    const URGENCIA =   3;


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
    public function clasificaciones()
    {
        return $this->belongsToMany(\App\Models\Clasificacion::class, 'cirugia_tipo_clasificacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'cirugia_tipo_id');
    }
}
