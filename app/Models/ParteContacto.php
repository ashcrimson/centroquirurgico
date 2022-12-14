<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ParteContacto
 * @package App\Models
 * @version November 6, 2021, 10:02 am CST
 *
 * @property \App\Models\ContactoTipo $tipo
 * @property \App\Models\Parte $parte
 * @property \App\Models\Parentesco $parentesco
 * @property integer $tipo_id
 * @property integer $parte_id
 * @property integer $parentesco_id
 * @property string $nombre
 * @property string $numero
 */
class ParteContacto extends Model
{
    use SoftDeletes;

    public $table = 'parte_contactos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo_id',
        'parte_id',
        'parentesco_id',
        'nombre',
        'numero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_id' => 'integer',
        'parte_id' => 'integer',
        'parentesco_id' => 'integer',
        'nombre' => 'string',
        'numero' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_id' => 'nullable',
        'parte_id' => 'required',
        'parentesco_id' => 'required',
        'nombre' => 'required|string|max:255',
        'numero' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\ContactoTipo::class, 'tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parte()
    {
        return $this->belongsTo(\App\Models\Parte::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parentesco()
    {
        return $this->belongsTo(\App\Models\Parentesco::class, 'parentesco_id');
    }
}
