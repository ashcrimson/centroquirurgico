<?php

namespace App\Http\Controllers;

use App\DataTables\ParteHistoricoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteHistoricoRequest;
use App\Http\Requests\UpdateParteHistoricoRequest;
use App\Models\ParteHistorico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteHistoricoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Historicos')->only(['show']);
        $this->middleware('permission:Crear Parte Historicos')->only(['create','store']);
        $this->middleware('permission:Editar Parte Historicos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Historicos')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteHistorico.
     *
     * @param ParteHistoricoDataTable $parteHistoricoDataTable
     * @return Response
     */
    public function index(ParteHistoricoDataTable $parteHistoricoDataTable)
    {
        return $parteHistoricoDataTable->render('parte_historicos.index');
    }

    /**
     * Show the form for creating a new ParteHistorico.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_historicos.create');
    }

    /**
     * Store a newly created ParteHistorico in storage.
     *
     * @param CreateParteHistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateParteHistoricoRequest $request)
    {
        $input = $request->all();

        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::create($input);

        Flash::success('Parte Historico guardado exitosamente.');

        return redirect(route('parteHistoricos.index'));
    }

    /**
     * Display the specified ParteHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            Flash::error('Parte Historico no encontrado');

            return redirect(route('parteHistoricos.index'));
        }

        return view('parte_historicos.show')->with('parteHistorico', $parteHistorico);
    }

    /**
     * Show the form for editing the specified ParteHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            Flash::error('Parte Historico no encontrado');

            return redirect(route('parteHistoricos.index'));
        }

        return view('parte_historicos.edit')->with('parteHistorico', $parteHistorico);
    }

    /**
     * Update the specified ParteHistorico in storage.
     *
     * @param  int              $id
     * @param UpdateParteHistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteHistoricoRequest $request)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            Flash::error('Parte Historico no encontrado');

            return redirect(route('parteHistoricos.index'));
        }

        $parteHistorico->fill($request->all());
        $parteHistorico->save();

        Flash::success('Parte Historico actualizado con éxito.');

        return redirect(route('parteHistoricos.index'));
    }

    /**
     * Remove the specified ParteHistorico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            Flash::error('Parte Historico no encontrado');

            return redirect(route('parteHistoricos.index'));
        }

        $parteHistorico->delete();

        Flash::success('Parte Historico deleted successfully.');

        return redirect(route('parteHistoricos.index'));
    }
}
