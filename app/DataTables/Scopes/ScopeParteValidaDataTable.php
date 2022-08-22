<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeParteValidaDataTable implements DataTableScope
{

    public $del;
    public $al;
    public $preop_anestesista;
    public $preop_eu;
    public $preop_medico;
    public $banco_sangre;
    public $rut_paciente;
    public $tipo_cirugia_id;
    public $grupo_base_id;
    public $especialidad_id;
    public $prioridad_clinica;

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {

        if ($this->del && $this->al){

            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();

            $query->whereBetween('created_at',[$del,$al]);

        }

        if ($this->preop_anestesista){
            $query->where('control_preop_anestesista',1);
        }

        if ($this->preop_eu){
            $query->where('control_preop_eu',1);
        }

        if ($this->preop_medico){
            $query->where('control_preop_medico',1);
        }

        if ($this->banco_sangre){
            $query->where('control_banco_sangre', 1);
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

    }

}
