<?php

namespace App\Http\Controllers;

use App\DataTables\EspecialidaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEspecialidaRequest;
use App\Http\Requests\UpdateEspecialidaRequest;
use App\Models\Especialida;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EspecialidaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Especialidas')->only(['show']);
        $this->middleware('permission:Crear Especialidas')->only(['create','store']);
        $this->middleware('permission:Editar Especialidas')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Especialidas')->only(['destroy']);
    }

    /**
     * Display a listing of the Especialida.
     *
     * @param EspecialidaDataTable $especialidaDataTable
     * @return Response
     */
    public function index(EspecialidaDataTable $especialidaDataTable)
    {
        return $especialidaDataTable->render('especialidas.index');
    }

    /**
     * Show the form for creating a new Especialida.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidas.create');
    }

    /**
     * Store a newly created Especialida in storage.
     *
     * @param CreateEspecialidaRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidaRequest $request)
    {
        $input = $request->all();

        /** @var Especialida $especialida */
        $especialida = Especialida::create($input);

        Flash::success('Especialida guardado exitosamente.');

        return redirect(route('especialidas.index'));
    }

    /**
     * Display the specified Especialida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            Flash::error('Especialida no encontrado');

            return redirect(route('especialidas.index'));
        }

        return view('especialidas.show')->with('especialida', $especialida);
    }

    /**
     * Show the form for editing the specified Especialida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            Flash::error('Especialida no encontrado');

            return redirect(route('especialidas.index'));
        }

        return view('especialidas.edit')->with('especialida', $especialida);
    }

    /**
     * Update the specified Especialida in storage.
     *
     * @param  int              $id
     * @param UpdateEspecialidaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidaRequest $request)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            Flash::error('Especialida no encontrado');

            return redirect(route('especialidas.index'));
        }

        $especialida->fill($request->all());
        $especialida->save();

        Flash::success('Especialida actualizado con éxito.');

        return redirect(route('especialidas.index'));
    }

    /**
     * Remove the specified Especialida from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            Flash::error('Especialida no encontrado');

            return redirect(route('especialidas.index'));
        }

        $especialida->delete();

        Flash::success('Especialida deleted successfully.');

        return redirect(route('especialidas.index'));
    }
}
