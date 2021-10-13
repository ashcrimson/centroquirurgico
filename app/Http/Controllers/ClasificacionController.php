<?php

namespace App\Http\Controllers;

use App\DataTables\ClasificacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClasificacionRequest;
use App\Http\Requests\UpdateClasificacionRequest;
use App\Models\Clasificacion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClasificacionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Clasificacions')->only(['show']);
        $this->middleware('permission:Crear Clasificacions')->only(['create','store']);
        $this->middleware('permission:Editar Clasificacions')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Clasificacions')->only(['destroy']);
    }

    /**
     * Display a listing of the Clasificacion.
     *
     * @param ClasificacionDataTable $clasificacionDataTable
     * @return Response
     */
    public function index(ClasificacionDataTable $clasificacionDataTable)
    {
        return $clasificacionDataTable->render('clasificacions.index');
    }

    /**
     * Show the form for creating a new Clasificacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('clasificacions.create');
    }

    /**
     * Store a newly created Clasificacion in storage.
     *
     * @param CreateClasificacionRequest $request
     *
     * @return Response
     */
    public function store(CreateClasificacionRequest $request)
    {
        $input = $request->all();

        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::create($input);

        Flash::success('Clasificacion guardado exitosamente.');

        return redirect(route('clasificacions.index'));
    }

    /**
     * Display the specified Clasificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            Flash::error('Clasificacion no encontrado');

            return redirect(route('clasificacions.index'));
        }

        return view('clasificacions.show')->with('clasificacion', $clasificacion);
    }

    /**
     * Show the form for editing the specified Clasificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            Flash::error('Clasificacion no encontrado');

            return redirect(route('clasificacions.index'));
        }

        return view('clasificacions.edit')->with('clasificacion', $clasificacion);
    }

    /**
     * Update the specified Clasificacion in storage.
     *
     * @param  int              $id
     * @param UpdateClasificacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClasificacionRequest $request)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            Flash::error('Clasificacion no encontrado');

            return redirect(route('clasificacions.index'));
        }

        $clasificacion->fill($request->all());
        $clasificacion->save();

        Flash::success('Clasificacion actualizado con éxito.');

        return redirect(route('clasificacions.index'));
    }

    /**
     * Remove the specified Clasificacion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            Flash::error('Clasificacion no encontrado');

            return redirect(route('clasificacions.index'));
        }

        $clasificacion->delete();

        Flash::success('Clasificacion deleted successfully.');

        return redirect(route('clasificacions.index'));
    }
}
