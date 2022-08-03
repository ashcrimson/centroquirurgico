<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Medicamento
 * @package App\Models
 * @version October 22, 2021, 10:13 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $nombre
 * @property string $text_completo
 * @property integer $suspension_dias
 */
class Medicamento extends Model
{
    use SoftDeletes;

    public $table = 'medicamentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['text_completo'];

    public $fillable = [
        'nombre',
        'suspension_dias',
        'reiniciar',
        'consideraciones',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'suspension_dias' => 'integer',
        'reiniciar' => 'string',
        'consideraciones' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'suspension_dias' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'reiniciar' => 'nullable',
        'consideraciones' => 'nullable',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function partes()
    {
        return $this->belongsToMany(\App\Models\Parte::class, 'medicamento_parte');
    }

    public function getTextCompletoAttribute()
    {
        return $this->nombre.' - Suspensión '. ($this->suspension_dias ?? 0) . ' (días)';
    }
}
