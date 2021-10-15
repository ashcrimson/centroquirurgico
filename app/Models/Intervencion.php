<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Intervencion
 * @package App\Models
 * @version October 15, 2021, 10:40 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $partes
 * @property string $cod_fonasa
 * @property string $nombre
 * @property string $legado_sn
 * @property string $cod_as400
 * @property string $codpab
 */
class Intervencion extends Model
{
    use SoftDeletes;

    public $table = 'intervenciones';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = [
        'text'
    ];


    public $fillable = [
        'cod_fonasa',
        'nombre',
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
        'id' => 'integer',
        'cod_fonasa' => 'string',
        'nombre' => 'string',
        'legado_sn' => 'string',
        'cod_as400' => 'string',
        'codpab' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cod_fonasa' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'legado_sn' => 'nullable|string|max:255',
        'cod_as400' => 'nullable|string|max:255',
        'codpab' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partes()
    {
        return $this->hasMany(\App\Models\Parte::class, 'intervencion_id');
    }

    public function getTextAttribute(){
        return $this->cod_fonasa.' / '.$this->nombre;
    }
}
