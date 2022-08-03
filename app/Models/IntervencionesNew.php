<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class IntervencionesNew
 * @package App\Models
 * @version May 28, 2022, 10:26 am -04
 *
 * @property string $cod_prest
 * @property string $corroper
 * @property string $descripcion
 */
class IntervencionesNew extends Model
{
    use SoftDeletes;

    public $table = 'intervenciones_new';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = [
        'text'
    ];

    public $fillable = [
        'cod_prest',
        'corroper',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cod_prest' => 'string',
        'corroper' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cod_prest' => 'required|string|max:255',
        'corroper' => 'nullable|string|max:255',
        'descripcion' => 'nullable|string|max:3000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function getTextAttribute(){
        return $this->cod_prest.' / '.$this->descripcion;
    }

}
