<?php

namespace App\Http\Controllers;

use App\DataTables\EspecialidadSubDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEspecialidadSubRequest;
use App\Http\Requests\UpdateEspecialidadSubRequest;
use App\Models\EspecialidadSub;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EspecialidadSubController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Especialidad Subs')->only(['show']);
        $this->middleware('permission:Crear Especialidad Subs')->only(['create','store']);
        $this->middleware('permission:Editar Especialidad Subs')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Especialidad Subs')->only(['destroy']);
    }

    /**
     * Display a listing of the EspecialidadSub.
     *
     * @param EspecialidadSubDataTable $especialidadSubDataTable
     * @return Response
     */
    public function index(EspecialidadSubDataTable $especialidadSubDataTable)
    {
        return $especialidadSubDataTable->render('especialidad_subs.index');
    }

    /**
     * Show the form for creating a new EspecialidadSub.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidad_subs.create');
    }

    /**
     * Store a newly created EspecialidadSub in storage.
     *
     * @param CreateEspecialidadSubRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadSubRequest $request)
    {
        $input = $request->all();

        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::create($input);

        Flash::success('Especialidad Sub guardado exitosamente.');

        return redirect(route('especialidadSubs.index'));
    }

    /**
     * Display the specified EspecialidadSub.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            Flash::error('Especialidad Sub no encontrado');

            return redirect(route('especialidadSubs.index'));
        }

        return view('especialidad_subs.show')->with('especialidadSub', $especialidadSub);
    }

    /**
     * Show the form for editing the specified EspecialidadSub.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            Flash::error('Especialidad Sub no encontrado');

            return redirect(route('especialidadSubs.index'));
        }

        return view('especialidad_subs.edit')->with('especialidadSub', $especialidadSub);
    }

    /**
     * Update the specified EspecialidadSub in storage.
     *
     * @param  int              $id
     * @param UpdateEspecialidadSubRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadSubRequest $request)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            Flash::error('Especialidad Sub no encontrado');

            return redirect(route('especialidadSubs.index'));
        }

        $especialidadSub->fill($request->all());
        $especialidadSub->save();

        Flash::success('Especialidad Sub actualizado con éxito.');

        return redirect(route('especialidadSubs.index'));
    }

    /**
     * Remove the specified EspecialidadSub from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            Flash::error('Especialidad Sub no encontrado');

            return redirect(route('especialidadSubs.index'));
        }

        $especialidadSub->delete();

        Flash::success('Especialidad Sub deleted successfully.');

        return redirect(route('especialidadSubs.index'));
    }
}
