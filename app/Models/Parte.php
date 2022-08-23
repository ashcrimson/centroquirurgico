<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Parte
 * @package App\Models
 * @version February 22, 2022, 12:37 pm CST
 *
 * @property \App\Models\CirugiaTipo $cirugiaTipo
 * @property \App\Models\Clasificacion $clasificacion
 * @property \App\Models\Convenio $convenio
 * @property \App\Models\Diagnostico $diagnostico
 * @property \App\Models\Especialidad $especialidad
 * @property \App\Models\EspecialidadSub $subEspecialidad
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
 * @property \App\Models\User $medicoCirujano
 * @property \Illuminate\Database\Eloquent\Collection $bitacoras
 * @property \Illuminate\Database\Eloquent\Collection $parteContactos
 * @property \Illuminate\Database\Eloquent\Collection $parteDiagnosticos
 * @property \Illuminate\Database\Eloquent\Collection $parteExamenes
 * @property \Illuminate\Database\Eloquent\Collection $parteIntervenciones
 * @property \Illuminate\Database\Eloquent\Collection $parteInsumoEspecificos
 * @property \Illuminate\Database\Eloquent\Collection $parteMedicamentos
 * @property integer $paciente_id
 * @property integer $cirugia_tipo_id
 * @property integer $especialidad_id
 * @property integer $sub_especialidad_id
 * @property integer $diagnostico_id
 * @property integer $medico_cirujano_id
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
 * @property string $tipo_cama_upc
 * @property boolean $prioridad
 * @property boolean $necesita_donante_sangre
 * @property boolean $evaluacion_preanestesica
 * @property boolean $equipo_rayos
 * @property boolean $segundo_ojo
 * @property boolean $prioridad_administrativa
 * @property boolean $cancer
 * @property integer $sistema_salud_id
 * @property string $titular_carga
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
 * @property string|\Carbon\Carbon $fecha_inscripcion
 * @property boolean $examenes_realizados
 * @property string|\Carbon\Carbon $fecha_examenes
 * @property boolean $control_preop_eu
 * @property string|\Carbon\Carbon $fecha_preop_eu
 * @property string|\Carbon\Carbon $fecha_preop_eu_valida
 * @property boolean $control_preop_medico
 * @property string|\Carbon\Carbon $fecha_preop_medico
 * @property string|\Carbon\Carbon $fecha_preop_medico_valida
 * @property boolean $control_preop_anestesista
 * @property string|\Carbon\Carbon $fecha_preop_anestesista
 * @property string|\Carbon\Carbon $fecha_preop_anestesista_valida
 * @property boolean $control_banco_sangre
 * @property string|\Carbon\Carbon $fecha_banco_sangre
 * @property string|\Carbon\Carbon $fecha_banco_sangre_valida
 * @property boolean $consentimiento
 * @property string $instrumental
 * @property string $observaciones
 * @property string $email
 * @property boolean $consentimiento_preop_anestesis
 * @property boolean $pase_preop_anestesista
 * @property string $indicaciones_preop_anestesista
 * @property boolean $consentimiento_preop_medico
 * @property boolean $pase_preop_medico
 * @property string $indicaciones_preop_medico
 * @property boolean $consentimiento_preop_eu
 * @property boolean $pase_preop_eu
 * @property string $indicaciones_preop_eu
 * @property string $prioridad_admin_observacion
 * @property integer $cantidad_donantes
 * @property boolean $pase_banco_sagre
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
        'tipo_cama_upc',
        'prioridad',
        'necesita_donante_sangre',
        'evaluacion_preanestesica',
        'equipo_rayos',
        'segundo_ojo',
        'prioridad_administrativa',
        'cancer',
        'sistema_salud_id',
        'titular_carga',
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
        'fecha_inscripcion',
        'examenes_realizados',
        'fecha_examenes',
        'control_preop_eu',
        'fecha_preop_eu',
        'fecha_preop_eu_valida',
        'control_preop_medico',
        'fecha_preop_medico',
        'fecha_preop_medico_valida',
        'control_preop_anestesista',
        'fecha_preop_anestesista',
        'fecha_preop_anestesista_valida',
        'consentimiento',
        'instrumental',
        'observaciones',
        'email',
        'consentimiento_preop_anestesis',
        'pase_preop_anestesista',
        'indicaciones_preop_anestesista',
        'consentimiento_preop_medico',
        'pase_preop_medico',
        'indicaciones_preop_medico',
        'consentimiento_preop_eu',
        'pase_preop_eu',
        'indicaciones_preop_eu',
        'control_banco_sangre',
        'fecha_banco_sangre',
        'fecha_banco_sangre_valida',
        'cantidad_donantes',
        'pase_banco_sagre',
        'evaluacion_especialidad',
        'indique_especialidad',
        'otros_insumos',
        'sub_especialidad_id',
        'prioridad_admin_observacion',
        'medico_cirujano_id',
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
        'tipo_cama_upc' => 'string',
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
        'fecha_inscripcion' => 'datetime',
        'examenes_realizados' => 'boolean',
        'fecha_examenes' => 'datetime',
        'control_preop_eu' => 'boolean',
        'fecha_preop_eu' => 'datetime',
        'fecha_preop_eu_valida' => 'datetime',
        'control_preop_medico' => 'boolean',
        'fecha_preop_medico' => 'datetime',
        'fecha_preop_medico_valida' => 'datetime',
        'control_preop_anestesista' => 'boolean',
        'fecha_preop_anestesista' => 'datetime',
        'fecha_preop_anestesista_valida' => 'datetime',
        'consentimiento' => 'boolean',
        'instrumental' => 'string',
        'observaciones' => 'string',
        'email' => 'string',
        'control_banco_sangre' => 'boolean',
        'fecha_banco_sangre' => 'datetime',
        'fecha_banco_sangre_valida' => 'datetime',
        'cantidad_donantes' => 'integer',
        'pase_banco_sagre' => 'boolean',
        'otros_insumos' => 'string',
        'sub_especialidad_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cirugia_tipo_id' => 'required',
        'especialidad_id' => 'required',
        'diagnostico_id' => 'nullable',
        'otros_diagnosticos' => 'nullable|string',
        'intervencion_id' => 'nullable',
        'lateralidad' => 'nullable|string|max:255',
        'otras_intervenciones' => 'nullable|string',
        'cma' => 'nullable|boolean',
        'clasificacion_id' => 'nullable',
        'tiempo_quirurgico' => 'required|integer',
        'anestesia_sugerida' => 'required|string|max:255',
        'aislamiento' => 'nullable|boolean',
        'alergia_latex' => 'nullable|boolean',
        'usuario_taco' => 'nullable|boolean',
        'nececidad_cama_upc' => 'nullable|boolean',
        'prioridad' => 'nullable|boolean',
        'necesita_donante_sangre' => 'nullable|boolean',
        'evaluacion_preanestesica' => 'nullable|boolean',
        'equipo_rayos' => 'nullable|boolean',
        'sistema_salud_id' => 'nullable',
        'preoperatorio_id' => 'required',
        'grupo_base_id' => 'nullable',
        'insumo_especifico_id' => 'nullable',
        'biopsia' => 'required|string|max:255',
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
        'deleted_at' => 'nullable',
        'cancer' => 'required',
        'control_banco_sangre' => 'nullable',
        'fecha_banco_sangre' => 'nullable',
        'fecha_banco_sangre_valida' => 'nullable',
        'cantidad_donantes' => 'nullable',
        'pase_banco_sagre' => 'nullable',
        'otros_insumos' => 'nullable',
        'sub_especialidad_id' => 'nullable',
    ];

    /**
     * Validation rules Create
     *
     * @var array
     */
    public static $rulesCreate = [
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
        'deleted_at' => 'nullable',
        'cancer' => 'nullable',
        'control_banco_sangre' => 'nullable',
        'fecha_banco_sangre' => 'nullable',
        'fecha_banco_sangre_valida' => 'nullable',
        'cantidad_donantes' => 'nullable',
        'pase_banco_sagre' => 'nullable',
        'otros_insumos' => 'nullable',
        'sub_especialidad_id' => 'nullable',
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
    public function subEspecialidad()
    {
        return $this->belongsTo(\App\Models\EspecialidadSub::class, 'sub_especialidad_id');
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
    public function medicoCirujano()
    {
        return $this->belongsTo(\App\Models\User::class, 'medico_cirujano_id');
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
        return $this->hasMany(\App\Models\ParteIntervencion::class, 'parte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function parteInsumoEspecificos()
    {
        return $this->hasMany(\App\Models\ParteInsumoEspecifico::class, 'parte_id');
    }

    public function parteHistoricos()
    {
        $parteHis = ParteHistorico::where(
            [
                ['rut', $this->paciente->run ?? null]
            ]
        )->get();

        return $parteHis;
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
        return in_array($this->estado_id,[
            ParteEstado::TEMPORAL,
            ParteEstado::INGRESADA,
        ]);
    }

    public function puedeEliminar()
    {

        return in_array($this->estado_id,[
            ParteEstado::TEMPORAL,
            ParteEstado::INGRESADA,
        ]);
    }

    public function preopsValidados()
    {
        return $this->fecha_preop_eu_valida && $this->fecha_preop_anestesista_valida && $this->fecha_preop_medico_valida;
    }

    public function diagnosticosNombres()
    {

        $nombreDiagnosticos = '';

        foreach ($this->parteDiagnosticos as $diagnos) {
            $nombreDiagnosticos .= $diagnos->diagnostico->nombre.' | ';
        }

        return $nombreDiagnosticos;

    }

    public function intervencionesNombres()
    {

        $nombresIntervenciones = '';

        foreach ($this->parteIntervenciones as $parteIntervencione) {
            $nombresIntervenciones .= $parteIntervencione->intervencionNew->descripcion.' | ';
        }

        return $nombresIntervenciones; 

    }

    public function intervencionesLateralidads()
    {

        $lateralidadsIntervenciones = '';

        foreach ($this->parteIntervenciones as $parteIntervencione) {
            $lateralidadsIntervenciones .= $parteIntervencione->lateralidad;
        }

        return $lateralidadsIntervenciones; 

    }

    public function insumosNombres() 
    {

        $nombresInsumosNombres = '';

        foreach ($this->parteInsumoEspecificos as $parteInsumoEspecifico) {
            $nombresInsumosNombres .= $parteInsumoEspecifico->insumo->nombre.' | ';
        }

        return $nombresInsumosNombres; 

    }

    public function insumosCantidads() 
    {

        $cantidadsInsumosCantidads = '';

        foreach ($this->parteInsumoEspecificos as $parteInsumoEspecifico) {
            $cantidadsInsumosCantidads .= $parteInsumoEspecifico->cantidad;
        }

        return $cantidadsInsumosCantidads; 

    }

}
