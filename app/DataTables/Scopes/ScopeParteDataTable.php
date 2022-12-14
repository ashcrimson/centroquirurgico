<?php

namespace App\DataTables\Scopes;

use App\Models\ParteEstado;
use App\Models\Role;
use App\Models\ParteIntervencion;
use App\Models\Intervencion;
use App\Models\IntervencionesNew;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeParteDataTable implements DataTableScope
{
    public $del;
    public $al;
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

    public function __construct()
    {

    }


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

            $query->whereBetween('partes.created_at',[$del,$al]);

        }

        if ($this->users) {
            if (is_array($this->users)){
                $query->whereIn('user_ingresa',$this->users);
            }else{
                $query->where('user_ingresa',$this->users);
            }
        }

        if ($this->estados){
            $query->whereIn('estado_id',$this->estados);
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

        if ($this->especialidad_id) {
            $query->where('especialidad_id', $this->especialidad_id);
        }

//        if ($this->examen_realizado) {
//            $query->where('examenes_realizados', 1);
//        }

        if ($this->examen_realizado == '1') {
            $query->where('examenes_realizados', 1);
        }

        if ($this->examen_realizado == '0') {
            $query->where('examenes_realizados', 0);
        }

//        if ($this->prioridad_administrativa){
//            $query->where('prioridad_administrativa',1);
//        }

        if ($this->prioridad_administrativa == '1'){
            $query->where('prioridad_administrativa',1);
        }

        if ($this->prioridad_administrativa == '0'){
            $query->where('prioridad_administrativa',0);
        }

//        if ($this->prioridad_clinica){
//            $query->where('prioridad',1);
//        }

        if ($this->prioridad_clinica == '1'){
            $query->where('prioridad',1);
        }

        if ($this->prioridad_clinica == '0'){
            $query->where('prioridad',0);
        }

        if ($this->tipo_cirugia_id) {
            $query->where('cirugia_tipo_id', $this->tipo_cirugia_id);
        }

        if ($this->grupo_base_id) {
            $query->where('grupo_base_id', $this->grupo_base_id);
        }

        if ($this->intervencion_id) {

            $query->whereHas('parteIntervenciones', function ($q) {
                $q->where('intervencion_new_id', $this->intervencion_id);
            });

        }


//        if ($this->intervencion_id) {
//            $query->whereHas('intervencion',function ($q){
//                $q->where('id',$this->intervencion_id);
//            });
//        }

        if ($this->rut_paciente) {
            $query->whereHas('paciente',function ($q){
                $q->where('run',$this->rut_paciente);
            });
        }

    }
}
