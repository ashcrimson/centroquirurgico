<?php

namespace App\Http\Controllers;

use App\DataTables\GrupobaseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGrupobaseRequest;
use App\Http\Requests\UpdateGrupobaseRequest;
use App\Models\Grupobase;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GrupobaseController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Grupobases')->only(['show']);
        $this->middleware('permission:Crear Grupobases')->only(['create','store']);
        $this->middleware('permission:Editar Grupobases')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Grupobases')->only(['destroy']);
    }

    /**
     * Display a listing of the Grupobase.
     *
     * @param GrupobaseDataTable $grupobaseDataTable
     * @return Response
     */
    public function index(GrupobaseDataTable $grupobaseDataTable)
    {
        return $grupobaseDataTable->render('grupobases.index');
    }

    /**
     * Show the form for creating a new Grupobase.
     *
     * @return Response
     */
    public function create()
    {
        return view('grupobases.create');
    }

    /**
     * Store a newly created Grupobase in storage.
     *
     * @param CreateGrupobaseRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupobaseRequest $request)
    {
        $input = $request->all();

        /** @var Grupobase $grupobase */
        $grupobase = Grupobase::create($input);

        Flash::success('Grupobase guardado exitosamente.');

        return redirect(route('grupobases.index'));
    }

    /**
     * Display the specified Grupobase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Grupobase $grupobase */
        $grupobase = Grupobase::find($id);

        if (empty($grupobase)) {
            Flash::error('Grupobase no encontrado');

            return redirect(route('grupobases.index'));
        }

        return view('grupobases.show')->with('grupobase', $grupobase);
    }

    /**
     * Show the form for editing the specified Grupobase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Grupobase $grupobase */
        $grupobase = Grupobase::find($id);

        if (empty($grupobase)) {
            Flash::error('Grupobase no encontrado');

            return redirect(route('grupobases.index'));
        }

        return view('grupobases.edit')->with('grupobase', $grupobase);
    }

    /**
     * Update the specified Grupobase in storage.
     *
     * @param  int              $id
     * @param UpdateGrupobaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupobaseRequest $request)
    {
        /** @var Grupobase $grupobase */
        $grupobase = Grupobase::find($id);

        if (empty($grupobase)) {
            Flash::error('Grupobase no encontrado');

            return redirect(route('grupobases.index'));
        }

        $grupobase->fill($request->all());
        $grupobase->save();

        Flash::success('Grupobase actualizado con éxito.');

        return redirect(route('grupobases.index'));
    }

    /**
     * Remove the specified Grupobase from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Grupobase $grupobase */
        $grupobase = Grupobase::find($id);

        if (empty($grupobase)) {
            Flash::error('Grupobase no encontrado');

            return redirect(route('grupobases.index'));
        }

        $grupobase->delete();

        Flash::success('Grupobase deleted successfully.');

        return redirect(route('grupobases.index'));
    }
}
