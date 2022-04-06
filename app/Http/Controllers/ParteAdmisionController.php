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

        $parteDataTable->addScope($scope);

        $estados = ParteEstado::whereIn('id',$idsEstadosDefecto)->get();

        return $parteDataTable->render('partes.admision.index',compact('estados'));
    }

    public function listaEspera(ParteListaEsperaDataTable $parteDataTable,Request $request)
    {
        $scope = new ScopeParteDataTable();

        $idsEstadosDefecto = [
            ParteEstado::LISTA_ESPERA,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
        ];

        $scope->estados = $request->estados ?? $idsEstadosDefecto;
        $scope->lista_espera = true;
        $scope->rut_paciente = $request->rut_paciente ?? null;
        $scope->tipo_cirugia_id = $request->tipo_cirugia_id ?? null;
        $scope->grupo_base_id = $request->grupo_base_id ?? null;

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

        if (empty($parte)) {
            flash()->error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.admision.edit')->with('parte', $parte);
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
