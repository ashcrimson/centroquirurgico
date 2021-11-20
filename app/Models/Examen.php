<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Examen
 * @package App\Models
 * @version November 19, 2021, 9:52 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $parteExamenes
 * @property string $name
 */
class Examen extends Model
{
    use SoftDeletes;

    public $table = 'examenes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteExamenes()
    {
        return $this->hasMany(\App\Models\ParteExamene::class, 'examen_id');
    }
}
