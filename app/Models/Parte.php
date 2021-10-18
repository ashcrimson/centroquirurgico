<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Parte
 * @package App\Models
 * @version October 15, 2021, 11:21 am CST
 *
 * @property \App\Models\CirugiaTipo $cirugiaTipo
 * @property \App\Models\Clasificacion $clasificacion
 * @property \App\Models\Diagnostico $diagnostico
 * @property \App\Models\Especialidad $especialidad
 * @property \App\Models\Intervencion $intervencion
 * @property \App\Models\Pabellon $pabellon
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\ParteEstado $estado
 * @property \App\Models\Preoperatorio $preoperatorio
 * @property \App\Models\User $userIngresa
 * @property integer $paciente_id
 * @property integer $cirugia_tipo_id
 * @property integer $especialidad_id
 * @property integer $diagnostico_id
 * @property string $otros_diagnosticos
 * @property string $medicamentos
 * @property integer $intervencion_id
 * @property string $lateralidad
 * @property string $otras_intervenciones
 * @property boolean $cma
 * @property integer $clasificacion_id
 * @property integer $tiempo_quirurgico
 * @property string $anestesia_sugerida
 * @property boolean $aislamiento
 * @property boolean $alergia_latex
 * @property boolean $usuario_taco
 * @property boolean $nececidad_cama_upc
 * @property boolean $prioridad
 * @property boolean $necesita_donante_sangre
 * @property boolean $evaluacion_preanestesica
 * @property boolean $equipo_rayos
 * @property boolean $insumos_especificos
 * @property integer $preoperatorio_id
 * @property boolean $biopsia
 * @property integer $user_ingresa
 * @property integer $estado_id
 * @property integer $pabellon_id
 * @property string|\Carbon\Carbon $fecha_pabellon
 * @property string|\Carbon\Carbon $fecha_digitacion
 * @property string $instrumental
 * @property string $observaciones
 */
class Parte extends Model
{
    use SoftDeletes;

    public $table = 'partes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'paciente_id',
        'cirugia_tipo_id',
        'especialidad_id',
        'diagnostico_id',
        'otros_diagnosticos',
        'medicamentos',
        'intervencion_id',
        'lateralidad',
        'otras_intervenciones',
        'cma',
        'clasificacion_id',
        'tiempo_quirurgico',
        'anestesia_sugerida',
        'aislamiento',
        'alergia_latex',
        'usuario_taco',
        'nececidad_cama_upc',
        'prioridad',
        'necesita_donante_sangre',
        'evaluacion_preanestesica',
        'equipo_rayos',
        'insumos_especificos',
        'preoperatorio_id',
        'biopsia',
        'user_ingresa',
        'estado_id',
        'pabellon_id',
        'fecha_pabellon',
        'fecha_digitacion',
        'instrumental',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'cirugia_tipo_id' => 'integer',
        'especialidad_id' => 'integer',
        'diagnostico_id' => 'integer',
        'otros_diagnosticos' => 'string',
        'medicamentos' => 'string',
        'intervencion_id' => 'integer',
        'lateralidad' => 'string',
        'otras_intervenciones' => 'string',
        'cma' => 'boolean',
        'clasificacion_id' => 'integer',
        'tiempo_quirurgico' => 'integer',
        'anestesia_sugerida' => 'string',
        'aislamiento' => 'boolean',
        'alergia_latex' => 'boolean',
        'usuario_taco' => 'boolean',
        'nececidad_cama_upc' => 'boolean',
        'prioridad' => 'boolean',
        'necesita_donante_sangre' => 'boolean',
        'evaluacion_preanestesica' => 'boolean',
        'equipo_rayos' => 'boolean',
        'insumos_especificos' => 'boolean',
        'preoperatorio_id' => 'integer',
        'biopsia' => 'string',
        'user_ingresa' => 'integer',
        'estado_id' => 'integer',
        'pabellon_id' => 'integer',
        'fecha_pabellon' => 'datetime',
        'fecha_digitacion' => 'datetime',
        'instrumental' => 'string',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cirugia_tipo_id' => 'required',
        'especialidad_id' => 'required',
        'diagnostico_id' => 'required',
        'otros_diagnosticos' => 'nullable|string',
        'medicamentos' => 'nullable|string',
        'intervencion_id' => 'required',
        'lateralidad' => 'nullable|string|max:255',
        'otras_intervenciones' => 'nullable|string',
        'cma' => 'nullable|boolean',
        'clasificacion_id' => 'required',
        'tiempo_quirurgico' => 'nullable|integer',
        'anestesia_sugerida' => 'nullable|string|max:255',
        'aislamiento' => 'nullable|boolean',
        'alergia_latex' => 'nullable|boolean',
        'usuario_taco' => 'nullable|boolean',
        'nececidad_cama_upc' => 'nullable|boolean',
        'prioridad' => 'nullable|boolean',
        'necesita_donante_sangre' => 'nullable|boolean',
        'evaluacion_preanestesica' => 'nullable|boolean',
        'equipo_rayos' => 'nullable|boolean',
        'insumos_especificos' => 'nullable|boolean',
        'preoperatorio_id' => 'required',
        'biopsia' => 'nullable|string',
        'pabellon_id' => 'nullable|integer',
        'fecha_pabellon' => 'nullable',
        'fecha_digitacion' => 'nullable',
        'instrumental' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cirugiaTipo()
    {
        return $this->belongsTo(\App\Models\CirugiaTipo::class, 'cirugia_tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function clasificacion()
    {
        return $this->belongsTo(\App\Models\Clasificacion::class, 'clasificacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function diagnostico()
    {
        return $this->belongsTo(\App\Models\Diagnostico::class, 'diagnostico_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
        public function especialidad()
    {
        return $this->belongsTo(\App\Models\Especialidad::class, 'especialidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function intervencion()
    {
        return $this->belongsTo(\App\Models\Intervencion::class, 'intervencion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pabellon()
    {
        return $this->belongsTo(\App\Models\Pabellon::class, 'pabellon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\ParteEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function preoperatorio()
    {
        return $this->belongsTo(\App\Models\Preoperatorio::class, 'preoperatorio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userIngresa()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_ingresa');
    }
}
