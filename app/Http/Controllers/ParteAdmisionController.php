<?php

namespace App\Http\Controllers;

use App\DataTables\ParteAdmisionDataTable;
use App\DataTables\ParteDataTable;
use App\DataTables\ParteListaEsperaDataTable;
use App\DataTables\Scopes\ScopeParteDataTable;
use App\Models\Parte;
use App\Models\ParteEstado;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParteAdmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParteAdmisionDataTable $parteDataTable,Request $request)
    {
        $scope = new ScopeParteDataTable();

        $idsEstadosDefecto = [
            ParteEstado::ENVIADA_ADMICION,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
            ParteEstado::ACTIVACION,
            ParteEstado::ELIMINADO,
        ];

        $scope->estados = $request->estados ?? $idsEstadosDefecto;
        $scope->examen_realizado = $request->get('examen_realizado') ?? null;
        $scope->grupo_base_id = $request->get('grupo_base_id') ?? null;
        $scope->tipo_cirugia_id = $request->get('tipo_cirugia_id') ?? null;
        $scope->del = $request->del ?? null;
        $scope->al = $request->al ?? null;

        $parteDataTable->addScope($scope);

        $estados = ParteEstado::whereIn('id',$idsEstadosDefecto)->get();

        return $parteDataTable->render('partes.admision.index',compact('estados'));
    }

    public function listaEspera(ParteListaEsperaDataTable $parteDataTable,Request $request)
    {
        $scope = new ScopeParteDataTable();

        $idsEstadosDefecto = [
            ParteEstado::TEMPORAL,
            ParteEstado::INGRESADA,
            ParteEstado::ENVIADA_ADMICION,
            ParteEstado::LISTA_ESPERA,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
            ParteEstado::ACTIVACION,
            ParteEstado::ELIMINADO,
            ParteEstado::OPERADO,
            ParteEstado::POR_ACTIVAR,
        ];

        $scope->estados = $request->estados ?? $idsEstadosDefecto;
        $scope->lista_espera = true;
        $scope->rut_paciente = $request->rut_paciente ?? null;
        $scope->tipo_cirugia_id = $request->tipo_cirugia_id ?? null;
        $scope->grupo_base_id = $request->grupo_base_id ?? null;
        $scope->tiene_cancer = $request->get('tiene_cancer') ?? null;
        $scope->especialidad_id = $request->especialidad_id ?? null;
        $scope->delListEspera = $request->del ?? null;
        $scope->alListEspera = $request->al ?? null;

        $parteDataTable->addScope($scope);

        $estados = ParteEstado::whereIn('id',$idsEstadosDefecto)->get();

        return $parteDataTable->render('partes.admision.lista_espera',compact('estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parte $parte)
    {

        $arrayUrlAnt = explode('/', $_SERVER['HTTP_REFERER']);
        $vieneDeListaEspera = 0;
        if (in_array('espera', $arrayUrlAnt, true)) {
            $vieneDeListaEspera = 1;
        }

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.admision.edit', compact('parte','vieneDeListaEspera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            flash()->error('Parte no encontrado');
            return redirect(route('partes.index'));
        }

        if ($request->lista_espera){
            $request->merge([
                'estado_id' => ParteEstado::LISTA_ESPERA,
                'fecha_inscripcion' => Carbon::now()
            ]);
        }

        $parte->fill($request->all());
        $parte->save();

        flash()->success('Parte actualizado con éxito.');
        if ($request->get('vieneDeListaEspera') == "1") {
            return redirect( route('admision.partes.lista.espera') );
        }
        return redirect(route('admision.partes'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
