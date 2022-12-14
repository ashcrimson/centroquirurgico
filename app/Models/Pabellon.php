<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Pabellon
 * @package App\Models
 * @version October 13, 2021, 12:35 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 */
class Pabellon extends Model
{
    use SoftDeletes;

    public $table = 'pabellones';
    
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'pabellon_id');
    }
}
