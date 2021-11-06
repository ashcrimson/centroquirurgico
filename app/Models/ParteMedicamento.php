<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteMedicamento
 * @package App\Models
 * @version November 6, 2021, 11:27 am CST
 *
 * @property \App\Models\Medicamento $medicamento
 * @property \App\Models\Parte $parte
 * @property integer $parte_id
 * @property integer $medicamento_id
 */
class ParteMedicamento extends Model
{
    use SoftDeletes;

    public $table = 'parte_medicamentos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parte_id',
        'medicamento_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parte_id' => 'integer',
        'medicamento_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parte_id' => 'required',
        'medicamento_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medicamento()
    {
        return $this->belongsTo(\App\Models\Medicamento::class, 'medicamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }
}
