<?php

namespace App\Http\Controllers;

use App\DataTables\GrupoBaseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGrupoBaseRequest;
use App\Http\Requests\UpdateGrupoBaseRequest;
use App\Models\GrupoBase;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GrupoBaseController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Grupo Bases')->only(['show']);
        $this->middleware('permission:Crear Grupo Bases')->only(['create','store']);
        $this->middleware('permission:Editar Grupo Bases')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Grupo Bases')->only(['destroy']);
    }

    /**
     * Display a listing of the GrupoBase.
     *
     * @param GrupoBaseDataTable $grupoBaseDataTable
     * @return Response
     */
    public function index(GrupoBaseDataTable $grupoBaseDataTable)
    {
        return $grupoBaseDataTable->render('grupo_bases.index');
    }

    /**
     * Show the form for creating a new GrupoBase.
     *
     * @return Response
     */
    public function create()
    {
        return view('grupo_bases.create');
    }

    /**
     * Store a newly created GrupoBase in storage.
     *
     * @param CreateGrupoBaseRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupoBaseRequest $request)
    {
        $input = $request->all();

        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::create($input);

        Flash::success('Grupo Base guardado exitosamente.');

        return redirect(route('grupoBases.index'));
    }

    /**
     * Display the specified GrupoBase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            Flash::error('Grupo Base no encontrado');

            return redirect(route('grupoBases.index'));
        }

        return view('grupo_bases.show')->with('grupoBase', $grupoBase);
    }

    /**
     * Show the form for editing the specified GrupoBase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            Flash::error('Grupo Base no encontrado');

            return redirect(route('grupoBases.index'));
        }

        return view('grupo_bases.edit')->with('grupoBase', $grupoBase);
    }

    /**
     * Update the specified GrupoBase in storage.
     *
     * @param  int              $id
     * @param UpdateGrupoBaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupoBaseRequest $request)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            Flash::error('Grupo Base no encontrado');

            return redirect(route('grupoBases.index'));
        }

        $grupoBase->fill($request->all());
        $grupoBase->save();

        Flash::success('Grupo Base actualizado con éxito.');

        return redirect(route('grupoBases.index'));
    }

    /**
     * Remove the specified GrupoBase from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            Flash::error('Grupo Base no encontrado');

            return redirect(route('grupoBases.index'));
        }

        $grupoBase->delete();

        Flash::success('Grupo Base deleted successfully.');

        return redirect(route('grupoBases.index'));
    }
}
