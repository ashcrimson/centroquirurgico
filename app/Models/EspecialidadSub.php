<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class EspecialidadSub
 * @package App\Models
 * @version June 3, 2022, 8:38 pm -04
 *
 * @property integer $especialidad_id
 * @property string $nombre
 */
class EspecialidadSub extends Model
{
    use SoftDeletes;

    public $table = 'especialidad_subs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'especialidad_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'especialidad_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'especialidad_id' => 'required',
        'nombre' => 'required|string|max:3000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//     **/
//    public function especialidad()
//    {
//        return $this->belongsTo(\App\Models\Especialidad::class, 'especialidad_id');
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function especialidad()
    {
        return $this->belongsToMany(\App\Models\especialidad::class, 'especialidad_especialidad_sub');
    }
}
