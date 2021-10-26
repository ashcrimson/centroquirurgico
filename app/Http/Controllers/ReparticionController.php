<?php

namespace App\Http\Controllers;

use App\DataTables\ReparticionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReparticionRequest;
use App\Http\Requests\UpdateReparticionRequest;
use App\Models\Reparticion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReparticionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver reparticiones')->only(['show']);
        $this->middleware('permission:Crear reparticiones')->only(['create','store']);
        $this->middleware('permission:Editar reparticiones')->only(['edit','update',]);
        $this->middleware('permission:Eliminar reparticiones')->only(['destroy']);
    }

    /**
     * Display a listing of the Reparticion.
     *
     * @param ReparticionDataTable $reparticionDataTable
     * @return Response
     */
    public function index(ReparticionDataTable $reparticionDataTable)
    {
        return $reparticionDataTable->render('reparticiones.index');
    }

    /**
     * Show the form for creating a new Reparticion.
     *
     * @return Response
     */
    public function create()
    {
        return view('reparticiones.create');
    }

    /**
     * Store a newly created Reparticion in storage.
     *
     * @param CreateReparticionRequest $request
     *
     * @return Response
     */
    public function store(CreateReparticionRequest $request)
    {
        $input = $request->all();

        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::create($input);

        Flash::success('Reparticion guardado exitosamente.');

        return redirect(route('reparticiones.index'));
    }

    /**
     * Display the specified Reparticion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            Flash::error('Reparticion no encontrado');

            return redirect(route('reparticiones.index'));
        }

        return view('reparticiones.show')->with('reparticion', $reparticion);
    }

    /**
     * Show the form for editing the specified Reparticion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            Flash::error('Reparticion no encontrado');

            return redirect(route('reparticiones.index'));
        }

        return view('reparticiones.edit')->with('reparticion', $reparticion);
    }

    /**
     * Update the specified Reparticion in storage.
     *
     * @param  int              $id
     * @param UpdateReparticionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReparticionRequest $request)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            Flash::error('Reparticion no encontrado');

            return redirect(route('reparticiones.index'));
        }

        $reparticion->fill($request->all());
        $reparticion->save();

        Flash::success('Reparticion actualizado con éxito.');

        return redirect(route('reparticiones.index'));
    }

    /**
     * Remove the specified Reparticion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            Flash::error('Reparticion no encontrado');

            return redirect(route('reparticiones.index'));
        }

        $reparticion->delete();

        Flash::success('Reparticion deleted successfully.');

        return redirect(route('reparticiones.index'));
    }
}
