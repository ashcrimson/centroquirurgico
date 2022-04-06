<?php

namespace App\Http\Controllers;

use App\DataTables\ParteDataTable;
use App\DataTables\Scopes\ScopeParteDataTable;
use App\Models\Parte;
use App\Models\ParteEstado;
use Illuminate\Http\Request;

class ParteListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParteDataTable $parteDataTable,Request $request)
    {
        $scope = new ScopeParteDataTable();

        $idsEstadosDefecto = [
            ParteEstado::ENVIADA_ADMICION,
            ParteEstado::LISTA_ESPERA,
            ParteEstado::PROGRAMADO,
            ParteEstado::SUSPENDIDO,
            ParteEstado::ACTIVACION,
            ParteEstado::ELIMINADO,
        ];

        $scope->estados = $idsEstadosDefecto;
        $scope->delListEspera = $request->del ?? null;
        $scope->alListEspera = $request->al ?? null;

        $parteDataTable->addScope($scope);

        $estados = ParteEstado::whereIn('id',$idsEstadosDefecto)->get();

        return $parteDataTable->render('partes.lista.index',compact('estados'));
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

        return view('partes.lista.edit')->with('parte', $parte);
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
