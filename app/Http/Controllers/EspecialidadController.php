<?php

namespace App\Http\Controllers;

use App\DataTables\EspecialidadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEspecialidadRequest;
use App\Http\Requests\UpdateEspecialidadRequest;
use App\Models\Especialidad;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EspecialidadController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver especialidades')->only(['show']);
        $this->middleware('permission:Crear especialidades')->only(['create','store']);
        $this->middleware('permission:Editar especialidades')->only(['edit','update',]);
        $this->middleware('permission:Eliminar especialidades')->only(['destroy']);
    }

    /**
     * Display a listing of the Especialidad.
     *
     * @param EspecialidadDataTable $especialidadDataTable
     * @return Response
     */
    public function index(EspecialidadDataTable $especialidadDataTable)
    {
        return $especialidadDataTable->render('especialidades.index');
    }

    /**
     * Show the form for creating a new Especialidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created Especialidad in storage.
     *
     * @param CreateEspecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadRequest $request)
    {
        $input = $request->all();

        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::create($input);

        $especialidad->patologias()->sync($request->patologias ?? []);

        $especialidad->especialidadSubs()->sync($request->especialidadSubs ?? []);

        Flash::success('Especialidad guardado exitosamente.');

        return redirect(route('especialidades.index'));
    }

    /**
     * Display the specified Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad no encontrado');

            return redirect(route('especialidades.index'));
        }

        return view('especialidades.show')->with('especialidad', $especialidad);
    }

    /**
     * Show the form for editing the specified Especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad no encontrado');

            return redirect(route('especialidades.index'));
        }

        return view('especialidades.edit')->with('especialidad', $especialidad);
    }

    /**
     * Update the specified Especialidad in storage.
     *
     * @param  int              $id
     * @param UpdateEspecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadRequest $request)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad no encontrado');

            return redirect(route('especialidades.index'));
        }

        $especialidad->fill($request->all());
        $especialidad->save();

        $especialidad->patologias()->sync($request->patologias ?? []);

        $especialidad->especialidadSubs()->sync($request->especialidadSubs ?? []);

        Flash::success('Especialidad actualizado con éxito.');

        return redirect(route('especialidades.index'));
    }

    /**
     * Remove the specified Especialidad from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad no encontrado');

            return redirect(route('especialidades.index'));
        }

        $especialidad->delete();

        Flash::success('Especialidad deleted successfully.');

        return redirect(route('especialidades.index'));
    }
}
