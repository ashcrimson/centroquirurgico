<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Intervenciones
 * @package App\Models
 * @version October 14, 2021, 9:46 am CST
 *
 * @property string $cod_fonasa
 * @property string $glosa
 * @property string $legado_sn
 * @property string $cod_as400
 * @property integer $codpab
 */
class Intervenciones extends Model
{
    use SoftDeletes;

    public $table = 'intervenciones';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cod_fonasa',
        'glosa',
        'legado_sn',
        'cod_as400',
        'codpab'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cod_fonasa' => 'string',
        'glosa' => 'string',
        'legado_sn' => 'string',
        'cod_as400' => 'string',
        'codpab' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
