<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Parentesco
 * @package App\Models
 * @version November 6, 2021, 9:30 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $parteContactos
 * @property string $nombre
 */
class Parentesco extends Model
{
    use SoftDeletes;

    public $table = 'parentescos';
    
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
    public function parteContactos()
    {
        return $this->hasMany(\App\Models\ParteContacto::class, 'parentesco_id');
    }
}
