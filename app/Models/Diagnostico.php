<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Diagnostico
 * @package App\Models
 * @version October 15, 2021, 10:41 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $cdogio
 * @property string $nombre
 */
class Diagnostico extends Model
{
    use SoftDeletes;

    public $table = 'diagnosticos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cdogio',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cdogio' => 'string',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cdogio' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'diagnostico_id');
    }

    public function getTextAttribute(){
        return $this->codigo.' / '.$this->nombre;
    }
}
