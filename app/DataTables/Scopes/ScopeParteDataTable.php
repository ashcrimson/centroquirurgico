<?php

namespace App\DataTables\Scopes;

use App\Models\ParteEstado;
use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopeParteDataTable implements DataTableScope
{
    public $estados;
    public $users;
    public $pacientes;
    public $medicos;
    public $prioridad_clinica;
    public $prioridad_administrativa;
    public $del;
    public $al;
    public $lista_espera;
    public $preop_anestesista;
    public $preop_eu;
    public $preop_medico;


    public function __construct()
    {
        $this->estados = request()->estados ?? null;
        $this->pacientes = request()->pacientes ?? null;
        $this->medicos = request()->medicos ?? null;
        $this->prioridad_administrativa = request()->prioridad_administrativa ?? null;
        $this->prioridad_clinica = request()->prioridad_clinica ?? null;
        $this->del = request()->del ?? null;
        $this->al = request()->al ?? null;
        $this->lista_espera = request()->lista_espera ?? false;
    }


    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {

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


        if ($this->pacientes){
            $query->whereHas('paciente',function ($q){

                if (is_array($this->pacientes)){
                    $q->whereIn('id',$this->pacientes);
                }else{
                    $q->where('id',$this->pacientes);
                }
            });
        }

        if ($this->medicos){
            if (is_array($this->medicos)){
                $query->whereIn('user_crea',$this->medicos);
            }else{
                $query->where('user_crea',$this->medicos);
            }
        }

        if ($this->prioridad_administrativa){
            $query->where('prioridad_administrativa',1);
        }

        if ($this->preop_anestesista){
            $query->whereNull('fecha_preop_anestesista_valida')
            ->where('control_preop_eu',1);
        }

        if ($this->preop_eu){
            $query->whereNull('fecha_preop_eu_valida')
            ->where('control_preop_medico',1);
        }

        if ($this->preop_medico){
            $query->whereNull('fecha_preop_medico_valida')
            ->where('control_preop_anestesista',1);
        }

        if ($this->prioridad_clinica){
            $query->where('prioridad',1);
        }

        if ($this->del && $this->al){

            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();

            if ($this->lista_espera){

                $query->whereBetween('fecha_inscripcion',[$del,$al]);
            }else{

                $query->whereBetween('created_at',[$del,$al]);
            }
        }
    }
}
