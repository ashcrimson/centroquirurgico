<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteDiagnostico
 * @package App\Models
 * @version October 26, 2021, 9:45 pm CST
 *
 * @property \App\Models\Diagnostico $diagnostico
 * @property \App\Models\Parte $parte
 * @property integer $diagnostico_id
 * @property integer $parte_id
 * @property string $nombre
 */
class ParteDiagnostico extends Model
{
    use SoftDeletes;

    public $table = 'parte_diagnosticos';
    
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
        'diagnostico_id' => 'integer',
        'parte_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'diagnostico_id' => 'required',
        'parte_id' => 'required',
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function diagnostico()
    {
        return $this->belongsTo(\App\Models\Diagnostico::class, 'diagnostico_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteDiagnosticos()
    {
        return $this->hasMany(\App\Models\ParteDiagnostico::class, 'diagnostico_id');
    }
}
