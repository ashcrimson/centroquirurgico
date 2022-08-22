<?php

namespace App\DataTables\Scopes;

use App\Models\ParteEstado;
use App\Models\Role;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeParteDataTable implements DataTableScope
{
    public $del;
    public $al;
    public $users;
    public $estados;
    public $tiene_cancer;
    public $especialidad_id;
    public $examen_realizado;
    public $prioridad_administrativa;
    public $prioridad_clinica;
    public $tipo_cirugia_id;
    public $grupo_base_id;

    public $pacientes;
    public $medicos;
    public $delListEspera;
    public $alListEspera;
    public $lista_espera;
    public $preop_anestesista;
    public $preop_eu;
    public $preop_medico;
    public $rut_paciente;
    public $banco_sangre;

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

            $query->whereBetween('created_at',[$del,$al]);

        }

        if ($this->users){
            if (is_array($this->users)){
                $query->whereIn('user_ingresa',$this->users);
            }else{
                $query->where('user_ingresa',$this->users);
            }
        }

        if ($this->estados){
            if (is_array($this->estados)){
                $query->whereIn('estado_id',$this->estados);
            }else{
                $query->where('estado_id',$this->estados);
            }
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

        if ($this->examen_realizado) {
            $query->where('examenes_realizados', 1);
        }

        if ($this->prioridad_administrativa){
            $query->where('prioridad_administrativa',1);
        }

        if ($this->prioridad_clinica){
            $query->where('prioridad',1);
        }

        if ($this->tipo_cirugia_id) {
            $query->where('cirugia_tipo_id', $this->tipo_cirugia_id);
        }

        if ($this->grupo_base_id) {
            $query->where('grupo_base_id', $this->grupo_base_id);
        }





        if ($this->pacientes){
            $query->whereHas('paciente',function ($q){

                if (is_array($this->pacientes)){
                    $q->whereIn('id',$this->pacientes);
                }else{
                    $q->where('id',$this->pacientes);
                }
            });
        }

        if ($this->medicos) {
            if (is_array($this->medicos) && count($this->medicos) != 0) {
                $query->whereIn('user_ingresa', $this->medicos);
            }
            else {
                $query->where('user_ingresa',$this->medicos);
            }
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

        if ($this->lista_espera){
            $query->whereNotNull('fecha_inscripcion');
        }

        if ($this->delListEspera && $this->alListEspera) {

            $del = Carbon::parse($this->delListEspera);
            $al = Carbon::parse($this->alListEspera)->addDay();
//            if ($this->lista_espera){
                $query->whereBetween('fecha_inscripcion',[$del,$al]);
//            } else {

//                $query->whereBetween('created_at',[$del,$al]);
//            }
        }

        if ($this->rut_paciente) {
            $query->whereHas('paciente',function ($q){
                $q->where('run',$this->rut_paciente);
            });
        }

    }
}
