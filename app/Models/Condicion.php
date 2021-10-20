<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Condicion
 * @package App\Models
 * @version October 20, 2021, 1:21 pm CST
 *
 * @property string $nombre
 */
class Condicion extends Model
{
    use SoftDeletes;

    public $table = 'condicions';
    

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
