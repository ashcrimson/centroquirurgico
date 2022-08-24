<?php

namespace App\DataTables\Scopes;

use App\Models\ParteEstado;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope; 

class ScopeParteListaEsperaDataTable implements DataTableScope
{

    public $delListEspera;
    public $alListEspera;
    public $lista_espera;
    public $estados;
    public $rut_paciente;
    public $users;
    public $tiene_cancer;
    public $especialidad_id;
    public $examen_realizado;
    public $prioridad_administrativa;
    public $prioridad_clinica;
    public $tipo_cirugia_id;
    public $grupo_base_id;
    public $intervencion_id;

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {

        if ($this->lista_espera){
            $query->whereNotNull('fecha_inscripcion');
        }

        if ($this->delListEspera && $this->alListEspera) {

            $del = Carbon::parse($this->delListEspera);
            $al = Carbon::parse($this->alListEspera)->addDay();

            $query->whereBetween('fecha_inscripcion',[$del,$al]);

        }

        if ($this->rut_paciente) {
            $query->whereHas('paciente',function ($q){
                $q->where('run',$this->rut_paciente);
            });
        }

        if ($this->tipo_cirugia_id) {
            $query->where('cirugia_tipo_id', $this->tipo_cirugia_id);
        }

        if ($this->grupo_base_id) {
            $query->where('grupo_base_id', $this->grupo_base_id);
        }

        if ($this->especialidad_id) {
            $query->where('especialidad_id', $this->especialidad_id);
        }

        if ($this->prioridad_clinica){
            $query->where('prioridad',1);
        }

        if ($this->estados){
            if (is_array($this->estados)){
                $query->whereIn('estado_id',$this->estados);
            }else{
                $query->where('estado_id',$this->estados);
            }
        }

        if ($this->rut_paciente) {
            $query->whereHas('paciente',function ($q){
                $q->where('run',$this->rut_paciente);
            });
        }

        if ($this->intervencion_id) {

            $query->whereHas('parteIntervenciones', function ($q) {
                $q->where('intervencion_new_id', $this->intervencion_id);
            });

        }

        if ($this->examen_realizado) {
            $query->where('examenes_realizados', 1);
        }

        if ($this->prioridad_administrativa){
            $query->where('prioridad_administrativa',1);
        }

        if ($this->tiene_cancer == '0') {
            $query->where('cancer', 0);
        }

        if ($this->tiene_cancer == '1') {
            $query->where('cancer', 1);
        }

        if ($this->tiene_cancer == '2') {
            $query->where('cancer', 2);
        }

        if ($this->users) {
            if (is_array($this->users)){
                $query->whereIn('user_ingresa',$this->users);
            }else{
                $query->where('user_ingresa',$this->users);
            }
        }

    }
}
