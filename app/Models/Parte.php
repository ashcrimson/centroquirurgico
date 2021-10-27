<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Parte
 * @package App\Models
 * @version October 22, 2021, 11:37 am CST
 *
 * @property \App\Models\CirugiaTipo $cirugiaTipo
 * @property \App\Models\Clasificacion $clasificacion
 * @property \App\Models\Convenio $convenio
 * @property \App\Models\Diagnostico $diagnostico
 * @property \App\Models\Especialidad $especialidad
 * @property \App\Models\GrupoBase $grupoBase
 * @property \App\Models\InsumoEspecifico $insumoEspecifico
 * @property \App\Models\Intervencion $intervencion
 * @property \App\Models\Pabellon $pabellon
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\ParteEstado $estado
 * @property \App\Models\Preoperatorio $preoperatorio
 * @property \App\Models\Reparticion $reparticion
 * @property \App\Models\SistemaSalud $sistemaSalud
 * @property \App\Models\User $userIngresa
 * @property \Illuminate\Database\Eloquent\Collection $bitacoras
 * @property \Illuminate\Database\Eloquent\Collection $medicamentos
 * @property \Illuminate\Database\Eloquent\Collection $parteContactos
 * @property \Illuminate\Database\Eloquent\Collection $parteIntervenciones
 * @property integer $paciente_id
 * @property integer $cirugia_tipo_id
 * @property integer $especialidad_id
 * @property integer $diagnostico_id
 * @property string $otros_diagnosticos
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
 * @property integer $sistema_salud_id
 * @property integer $preoperatorio_id
 * @property integer $grupo_base_id
 * @property integer $insumo_especifico_id
 * @property string $biopsia
 * @property integer $user_ingresa
 * @property integer $estado_id
 * @property integer $pabellon_id
 * @property boolean $extrademanda
 * @property integer $convenio_id
 * @property boolean $derivacion
 * @property integer $reparticion_id
 * @property string|\Carbon\Carbon $fecha_pabellon
 * @property string|\Carbon\Carbon $fecha_digitacion
 * @property boolean $examenes_realizados
 * @property string|\Carbon\Carbon $fecha_examenes
 * @property boolean $control_preop_eu
 * @property string|\Carbon\Carbon $fecha_preop_eu
 * @property boolean $control_preop_medico
 * @property string|\Carbon\Carbon $fecha_preop_medico
 * @property boolean $control_preop_anestesista
 * @property string|\Carbon\Carbon $fecha_preop_anestesista
 * @property string $instrumental
 * @property string $observaciones
 * @property string $email
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
        'sistema_salud_id',
        'preoperatorio_id',
        'grupo_base_id',
        'insumo_especifico_id',
        'biopsia',
        'user_ingresa',
        'estado_id',
        'pabellon_id',
        'extrademanda',
        'convenio_id',
        'derivacion',
        'reparticion_id',
        'fecha_pabellon',
        'fecha_digitacion',
        'examenes_realizados',
        'fecha_examenes',
        'control_preop_eu',
        'fecha_preop_eu',
        'control_preop_medico',
        'fecha_preop_medico',
        'control_preop_anestesista',
        'fecha_preop_anestesista',
        'instrumental',
        'observaciones',
        'email',
        'segundo_ojo',
        'tipo_cama_upc',
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
        'sistema_salud_id' => 'integer',
        'preoperatorio_id' => 'integer',
        'grupo_base_id' => 'integer',
        'insumo_especifico_id' => 'integer',
        'biopsia' => 'string',
        'user_ingresa' => 'integer',
        'estado_id' => 'integer',
        'pabellon_id' => 'integer',
        'extrademanda' => 'boolean',
        'convenio_id' => 'integer',
        'derivacion' => 'boolean',
        'reparticion_id' => 'integer',
        'fecha_pabellon' => 'datetime',
        'fecha_digitacion' => 'datetime',
        'examenes_realizados' => 'boolean',
        'fecha_examenes' => 'datetime',
        'control_preop_eu' => 'boolean',
        'fecha_preop_eu' => 'datetime',
        'control_preop_medico' => 'boolean',
        'fecha_preop_medico' => 'datetime',
        'control_preop_anestesista' => 'boolean',
        'fecha_preop_anestesista' => 'datetime',
        'instrumental' => 'string',
        'observaciones' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cirugia_tipo_id' => 'nullable',
        'especialidad_id' => 'nullable',
        'diagnostico_id' => 'nullable',
        'otros_diagnosticos' => 'nullable|string',
        'intervencion_id' => 'nullable',
        'lateralidad' => 'nullable|string|max:255',
        'otras_intervenciones' => 'nullable|string',
        'cma' => 'nullable|boolean',
        'clasificacion_id' => 'nullable',
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
        'sistema_salud_id' => 'nullable',
        'preoperatorio_id' => 'nullable',
        'grupo_base_id' => 'nullable',
        'insumo_especifico_id' => 'nullable',
        'biopsia' => 'nullable|string|max:255',
        'pabellon_id' => 'nullable|integer',
        'extrademanda' => 'nullable|boolean',
        'convenio_id' => 'nullable',
        'derivacion' => 'nullable|boolean',
        'reparticion_id' => 'nullable',
        'fecha_pabellon' => 'nullable',
        'fecha_digitacion' => 'nullable',
        'examenes_realizados' => 'nullable|boolean',
        'fecha_examenes' => 'nullable',
        'control_preop_eu' => 'nullable|boolean',
        'fecha_preop_eu' => 'nullable',
        'control_preop_medico' => 'nullable|boolean',
        'fecha_preop_medico' => 'nullable',
        'control_preop_anestesista' => 'nullable|boolean',
        'fecha_preop_anestesista' => 'nullable',
        'instrumental' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'email' => 'nullable|string',
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
    public function convenio()
    {
        return $this->belongsTo(\App\Models\Convenio::class, 'convenio_id');
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
    public function grupoBase()
    {
        return $this->belongsTo(\App\Models\GrupoBase::class, 'grupo_base_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function insumoEspecifico()
    {
        return $this->belongsTo(\App\Models\InsumoEspecifico::class, 'insumo_especifico_id');
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
    public function reparticion()
    {
        return $this->belongsTo(\App\Models\Reparticion::class, 'reparticion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sistemaSalud()
    {
        return $this->belongsTo(\App\Models\SistemaSalud::class, 'sistema_salud_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userIngresa()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_ingresa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bitacoras()
    {
        return $this->hasMany(\App\Models\Bitacora::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function medicamentos()
    {
        return $this->belongsToMany(\App\Models\Medicamento::class, 'medicamento_parte');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteContactos()
    {
        return $this->hasMany(\App\Models\ParteContacto::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteDiagnosticos()
    {
        return $this->hasMany(\App\Models\ParteDiagnostico::class, 'parte_id');
    }

    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteIntervenciones()
    {
        return $this->hasMany(\App\Models\ParteIntervencione::class, 'parte_id');
    }

    public function estaAdmision()
    {
        return in_array($this->estado_id,[
            ParteEstado::ENVIADA_ADMICION,
        ]);
    }

    public function puedeEditar()
    {
        return in_array($this->estado_id,[
            ParteEstado::TEMPORAL,
            ParteEstado::INGRESADA,
        ]);
    }

    public function puedeEditarAdmision()
    {
        return in_array($this->estado_id,[
            ParteEstado::ENVIADA_ADMICION,
            ParteEstado::LISTA_ESPERA,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
        ]);
    }

    public function esTemporal()
    {
        return $this->estado_id==ParteEstado::TEMPORAL;
    }

    public function estaEnEspera()
    {
        return $this->estado_id==ParteEstado::LISTA_ESPERA;
    }

    public function puedeEnviarAdmision()
    {
        return $this->estado_id==ParteEstado::INGRESADA;
    }
}
