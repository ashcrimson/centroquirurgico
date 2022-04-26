<?php

namespace App\Http\Controllers;

use App\DataTables\ParteDataTable;
use App\DataTables\ParteValidaDataTable;
use App\DataTables\Scopes\ScopeParteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteRequest;
use App\Http\Requests\UpdateParteRequest;
use App\Models\Paciente;
use App\Models\Parte;
use App\Models\ParteEstado;
use App\Http\Controllers\AppBaseController;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class ParteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Partes')->only(['show']);
        $this->middleware('permission:Crear Partes')->only(['create','store']);
        $this->middleware('permission:Editar Partes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Partes')->only(['destroy']);
    }

    /**
     * Display a listing of the Parte.
     *
     * @param ParteDataTable $parteDataTable
     * @return Response
     */
    public function index(ParteDataTable $parteDataTable,Request $request)
    {

        if (auth()->user()->hasRole(Role::ADMISION)){
            return redirect(route('admision.partes'));
        }

        if (auth()->user()->hasAnyRole(Role::PREOP_MEDICO,Role::PREOP_EU,Role::PREOP_ANESTESISTA
            ,Role::BANCO_SANGRE)){
            return redirect(route('partes.validar.index'));
        }

        $scope = new ScopeParteDataTable();

        $idsEstadosDefecto = [
            ParteEstado::INGRESADA,
            ParteEstado::ENVIADA_ADMICION,
            ParteEstado::LISTA_ESPERA,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
            ParteEstado::ACTIVACION,
            ParteEstado::ELIMINADO,
        ];

        $scope->estados = $request->estados ?? $idsEstadosDefecto;
        $scope->users = auth()->user()->id;
        $scope->del = $request->del ?? null;
        $scope->al = $request->al ?? null;
        $scope->rut_paciente = $request->rut_paciente ?? null;
        $scope->tipo_cirugia_id = $request->tipo_cirugia_id ?? null;
        $scope->grupo_base_id = $request->grupo_base_id ?? null;
        $scope->prioridad_clinica = $request->prioridad ?? null;

        $parteDataTable->addScope($scope);

        $estados = ParteEstado::whereIn('id',$idsEstadosDefecto)->get();

        return $parteDataTable->render('partes.index',compact('estados'));
    }


    /**
     * Show the form for creating a new Parte.
     *
     * @return Response
     */
    public function create()
    {


        $parte = $this->getParteTemporal();

        return redirect(route('partes.edit',$parte->id));
    }

    /**
     * Store a newly created Parte in storage.
     *
     * @param CreateParteRequest $request
     *
     * @return Response
     */
    public function store(CreateParteRequest $request)
    {

        try {
            DB::beginTransaction();

            $paciente = $this->creaOactualizaPaciente($request);

            $request->merge([
                'paciente_id' => $paciente->id,
                'user_ingresa' => auth()->user()->id,
                'estado_id' => ParteEstado::INGRESADA,
            ]);

            /** @var Parte $parte */
            $parte = Parte::create($request->all());



        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        flash()->success('Parte guardado exitosamente.');

        return redirect(route('partes.index'));
    }

    /**
     * Display the specified Parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.show')->with('parte', $parte);
    }

    /**
     * Show the form for editing the specified Parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (!$parte->esTemporal()){
            $parte = $this->addAttributos($parte);
        }

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.edit')->with('parte', $parte);
    }

    /**
     * Update the specified Parte in storage.
     *
     * @param  int              $id
     * @param UpdateParteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteRequest $request)
    {

        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        $paciente = $this->creaOactualizaPaciente($request);

        $estado = $request->enviar_admin ? ParteEstado::ENVIADA_ADMICION : ParteEstado::INGRESADA;

        $request->merge([
            'paciente_id' => $paciente->id,
            'estado_id' => $estado,
        ]);


        $parte->fill($request->all());
        $parte->save();

        flash()->success('Parte actualizado con éxito.');

        return redirect(route('partes.index'));
    }

    /**
     * Remove the specified Parte from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        $parte->delete();

        flash()->success('Parte deleted successfully.');

        return redirect(route('partes.index'));
    }

    public function creaOactualizaPaciente($request)
    {
        $paciente = Paciente::updateOrCreate([
            'run' => $request->run,
            'dv_run' => $request->dv_run,

        ],[
            'run' => $request->run,
            'fecha_nac' => $request->fecha_nac,
            'dv_run' => $request->dv_run,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,

            'sexo' => $request->sexo ? 'M' : 'F',

            'direccion' => $request->direccion,
            'familiar_responsable' => $request->familiar_responsable,
            'telefono' => $request->telefono,
            'telefono2' => $request->telefono2,
            'prevision_id' => $request->prevision_id,
            'clave' => $request->clave,
            'movil_envia' => $request->movil_envia,

        ]);

        return $paciente;
    }

    public function addAttributos(Parte $parte)
    {

        $parte->setAttribute("run" ,$parte->paciente->run);
        $parte->setAttribute("dv_run" ,$parte->paciente->dv_run);
        $parte->setAttribute("apellido_paterno" ,$parte->paciente->apellido_paterno);
        $parte->setAttribute("apellido_materno" ,$parte->paciente->apellido_materno);
        $parte->setAttribute("primer_nombre" ,$parte->paciente->primer_nombre);
        $parte->setAttribute("segundo_nombre" ,$parte->paciente->segundo_nombre);
        $parte->setAttribute("fecha_nac" ,Carbon::parse($parte->paciente->fecha_nac)->format('Y-m-d'));
        $parte->setAttribute("sexo" ,$parte->paciente->sexo == 'M' ? 1 : 0);

        $parte->setAttribute("direccion" ,$parte->paciente->direccion);
        $parte->setAttribute("familiar_responsable" ,$parte->paciente->familiar_responsable);
        $parte->setAttribute("telefono" ,$parte->paciente->telefono);
        $parte->setAttribute("telefono2" ,$parte->paciente->telefono2);
        $parte->setAttribute("prevision_id" ,$parte->paciente->prevision_id);
        $parte->setAttribute("clave" ,$parte->paciente->clave);
        $parte->setAttribute("movil_envia" ,$parte->paciente->movil_envia);


        return $parte;
    }

    public function getParteTemporal(){

        $sol = Parte::where('user_ingresa',auth()->user()->id)
            ->where('estado_id',ParteEstado::TEMPORAL)
            ->first();

        if (!$sol){
            $sol = Parte::create([
                'user_ingresa' => auth()->user()->id,
                'estado_id' => ParteEstado::TEMPORAL,
            ]);
        }

        return $sol;
    }


    public function validarPreop(ParteValidaDataTable $dataTable)
    {
        $scope = new ScopeParteDataTable();

        if (auth()->user()->hasRole(Role::PREOP_ANESTESISTA)){

            $scope->preop_anestesista = 1;
        }

        if (auth()->user()->hasRole(Role::PREOP_EU)){

            $scope->preop_eu = 1;
        }

        if (auth()->user()->hasRole(Role::PREOP_MEDICO)){

            $scope->preop_medico = 1;
        }

        if (auth()->user()->hasRole(Role::BANCO_SANGRE)){
            $scope->banco_sangre = 1;
        }

        $scope->rut_paciente = $request->rut_paciente ?? null;
        $scope->tipo_cirugia_id = $request->tipo_cirugia_id ?? null;
        $scope->grupo_base_id = $request->grupo_base_id ?? null;
        $scope->prioridad_clinica = $request->prioridad ?? null;

        $dataTable->addScope($scope);

        return $dataTable->render('partes.index');
    }

    public function validarPreopStore($tipo,Parte $parte)
    {

        switch ($tipo){
            case 'anestesia':
                $parte->fecha_preop_anestesista_valida = Carbon::now();
                $parte->indicaciones_preop_anestesista = request()->get('indicaciones_preop_anestesista') ?? null;
                $parte->consentimiento_preop_anestesis = request()->get('consentimiento_preop_anestesis') ?? null;
                $parte->pase_preop_anestesista = request()->get('pase_preop_anestesista') ?? null;
                break;
            case 'eu':
                $parte->fecha_preop_eu_valida = Carbon::now();
                $parte->indicaciones_preop_eu = request()->get('indicaciones_preop_eu') ?? null;
                $parte->consentimiento_preop_eu = request()->get('consentimiento_preop_eu') ?? null;
                $parte->pase_preop_eu = request()->get('pase_preop_eu') ?? null;
                break;
            case 'medico':
                $parte->fecha_preop_medico_valida = Carbon::now();
                $parte->indicaciones_preop_medico = request()->get('indicaciones_preop_medico') ?? null;
                $parte->consentimiento_preop_medico = request()->get('consentimiento_preop_medico') ?? null;
                $parte->pase_preop_medico = request()->get('pase_preop_medico') ?? null;
                break;
            case 'banco_sangre':
                $parte->fecha_banco_sangre_valida = Carbon::now();
                $parte->cantidad_donantes = request()->get('cantidad_donantes') ?? null;
                $parte->pase_banco_sagre = request()->get('pase_banco_sagre') ?? null;
                break;
        }

        $parte->save();

        flash('Parte validada')->success();

        return redirect(route('partes.validar.index'));

    }
}
