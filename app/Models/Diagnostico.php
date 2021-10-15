<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Diagnostico
 * @package App\Models
 * @version October 14, 2021, 9:33 am CST
 *
 * @property string $codigo
 * @property string $descripcion
 */
class Diagnostico extends Model
{
    use SoftDeletes;

    public $table = 'diagnosticos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'descripcion' => 'string'
    ];

    protected $appends = [
        'campo_extra'     
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function getCampoExtraAttribute(){
        return $this->codigo.'/'.$this->descripcion;
    }

    
}
