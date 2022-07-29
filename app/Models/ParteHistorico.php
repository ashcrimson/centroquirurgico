<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteHistorico
 * @package App\Models
 * @version July 29, 2022, 6:44 pm -04
 *
 * @property integer $num_parte
 * @property integer $rut
 * @property string|\Carbon\Carbon $fecha
 */
class ParteHistorico extends Model
{
    use SoftDeletes;

    public $table = 'partes_historicos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'num_parte',
        'rut',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'num_parte' => 'integer',
        'rut' => 'integer',
        'fecha' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'num_parte' => 'nullable',
        'rut' => 'nullable',
        'fecha' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
