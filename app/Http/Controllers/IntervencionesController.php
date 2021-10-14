<?php

namespace App\Http\Controllers;

use App\DataTables\IntervencionesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIntervencionesRequest;
use App\Http\Requests\UpdateIntervencionesRequest;
use App\Models\Intervenciones;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IntervencionesController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Intervenciones')->only(['show']);
        $this->middleware('permission:Crear Intervenciones')->only(['create','store']);
        $this->middleware('permission:Editar Intervenciones')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Intervenciones')->only(['destroy']);
    }

    /**
     * Display a listing of the Intervenciones.
     *
     * @param IntervencionesDataTable $intervencionesDataTable
     * @return Response
     */
    public function index(IntervencionesDataTable $intervencionesDataTable)
    {
        return $intervencionesDataTable->render('intervenciones.index');
    }

    /**
     * Show the form for creating a new Intervenciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('intervenciones.create');
    }

    /**
     * Store a newly created Intervenciones in storage.
     *
     * @param CreateIntervencionesRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervencionesRequest $request)
    {
        $input = $request->all();

        /** @var Intervenciones $intervenciones */
        $intervenciones = Intervenciones::create($input);

        Flash::success('Intervenciones guardado exitosamente.');

        return redirect(route('intervenciones.index'));
    }

    /**
     * Display the specified Intervenciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Intervenciones $intervenciones */
        $intervenciones = Intervenciones::find($id);

        if (empty($intervenciones)) {
            Flash::error('Intervenciones no encontrado');

            return redirect(route('intervenciones.index'));
        }

        return view('intervenciones.show')->with('intervenciones', $intervenciones);
    }

    /**
     * Show the form for editing the specified Intervenciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Intervenciones $intervenciones */
        $intervenciones = Intervenciones::find($id);

        if (empty($intervenciones)) {
            Flash::error('Intervenciones no encontrado');

            return redirect(route('intervenciones.index'));
        }

        return view('intervenciones.edit')->with('intervenciones', $intervenciones);
    }

    /**
     * Update the specified Intervenciones in storage.
     *
     * @param  int              $id
     * @param UpdateIntervencionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervencionesRequest $request)
    {
        /** @var Intervenciones $intervenciones */
        $intervenciones = Intervenciones::find($id);

        if (empty($intervenciones)) {
            Flash::error('Intervenciones no encontrado');

            return redirect(route('intervenciones.index'));
        }

        $intervenciones->fill($request->all());
        $intervenciones->save();

        Flash::success('Intervenciones actualizado con éxito.');

        return redirect(route('intervenciones.index'));
    }

    /**
     * Remove the specified Intervenciones from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Intervenciones $intervenciones */
        $intervenciones = Intervenciones::find($id);

        if (empty($intervenciones)) {
            Flash::error('Intervenciones no encontrado');

            return redirect(route('intervenciones.index'));
        }

        $intervenciones->delete();

        Flash::success('Intervenciones deleted successfully.');

        return redirect(route('intervenciones.index'));
    }
}
