<?php

namespace App\Http\Controllers;

use App\DataTables\ParteIntervencionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteIntervencionRequest;
use App\Http\Requests\UpdateParteIntervencionRequest;
use App\Models\ParteIntervencion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteIntervencionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Intervencions')->only(['show']);
        $this->middleware('permission:Crear Parte Intervencions')->only(['create','store']);
        $this->middleware('permission:Editar Parte Intervencions')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Intervencions')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteIntervencion.
     *
     * @param ParteIntervencionDataTable $parteIntervencionDataTable
     * @return Response
     */
    public function index(ParteIntervencionDataTable $parteIntervencionDataTable)
    {
        return $parteIntervencionDataTable->render('parte_intervencions.index');
    }

    /**
     * Show the form for creating a new ParteIntervencion.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_intervencions.create');
    }

    /**
     * Store a newly created ParteIntervencion in storage.
     *
     * @param CreateParteIntervencionRequest $request
     * 
     * @return Response
     */
    public function store(CreateParteIntervencionRequest $request)
    {
        $input = $request->all();

        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::create($input);

        Flash::success('Intervención guardada exitosamente.');

        return redirect(route('parteIntervencions.index'));
    }

    /**
     * Display the specified ParteIntervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            Flash::error('Parte Intervencion no encontrado');

            return redirect(route('parteIntervencions.index'));
        }

        return view('parte_intervencions.show')->with('parteIntervencion', $parteIntervencion);
    }

    /**
     * Show the form for editing the specified ParteIntervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            Flash::error('Parte Intervencion no encontrado');

            return redirect(route('parteIntervencions.index'));
        }

        return view('parte_intervencions.edit')->with('parteIntervencion', $parteIntervencion);
    }

    /**
     * Update the specified ParteIntervencion in storage.
     *
     * @param  int              $id
     * @param UpdateParteIntervencionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteIntervencionRequest $request)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            Flash::error('Parte Intervencion no encontrado');

            return redirect(route('parteIntervencions.index'));
        }

        $parteIntervencion->fill($request->all());
        $parteIntervencion->save();

        Flash::success('Parte Intervencion actualizado con éxito.');

        return redirect(route('parteIntervencions.index'));
    }

    /**
     * Remove the specified ParteIntervencion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            Flash::error('Parte Intervencion no encontrado');

            return redirect(route('parteIntervencions.index'));
        }

        $parteIntervencion->delete();

        Flash::success('Intervencion Eliminada Exitosamente.');

        return redirect(route('parteIntervencions.index'));
    }
}
