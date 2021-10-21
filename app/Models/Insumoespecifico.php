<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Insumoespecifico
 * @package App\Models
 * @version October 21, 2021, 7:51 am CST
 *
 * @property string $nombre
 */
class Insumoespecifico extends Model
{
    use SoftDeletes;

    public $table = 'insumoespecificos';
    

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
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
