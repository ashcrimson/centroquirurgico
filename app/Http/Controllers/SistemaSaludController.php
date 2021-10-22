<?php

namespace App\Http\Controllers;

use App\DataTables\SistemaSaludDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSistemaSaludRequest;
use App\Http\Requests\UpdateSistemaSaludRequest;
use App\Models\SistemaSalud;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SistemaSaludController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Sistema Saluds')->only(['show']);
        $this->middleware('permission:Crear Sistema Saluds')->only(['create','store']);
        $this->middleware('permission:Editar Sistema Saluds')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Sistema Saluds')->only(['destroy']);
    }

    /**
     * Display a listing of the SistemaSalud.
     *
     * @param SistemaSaludDataTable $sistemaSaludDataTable
     * @return Response
     */
    public function index(SistemaSaludDataTable $sistemaSaludDataTable)
    {
        return $sistemaSaludDataTable->render('sistema_saluds.index');
    }

    /**
     * Show the form for creating a new SistemaSalud.
     *
     * @return Response
     */
    public function create()
    {
        return view('sistema_saluds.create');
    }

    /**
     * Store a newly created SistemaSalud in storage.
     *
     * @param CreateSistemaSaludRequest $request
     *
     * @return Response
     */
    public function store(CreateSistemaSaludRequest $request)
    {
        $input = $request->all();

        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::create($input);

        Flash::success('Sistema Salud guardado exitosamente.');

        return redirect(route('sistemaSalud.index'));
    }

    /**
     * Display the specified SistemaSalud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            Flash::error('Sistema Salud no encontrado');

            return redirect(route('sistemaSalud.index'));
        }

        return view('sistema_saluds.show')->with('sistemaSalud', $sistemaSalud);
    }

    /**
     * Show the form for editing the specified SistemaSalud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            Flash::error('Sistema Salud no encontrado');

            return redirect(route('sistemaSalud.index'));
        }

        return view('sistema_saluds.edit')->with('sistemaSalud', $sistemaSalud);
    }

    /**
     * Update the specified SistemaSalud in storage.
     *
     * @param  int              $id
     * @param UpdateSistemaSaludRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSistemaSaludRequest $request)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            Flash::error('Sistema Salud no encontrado');

            return redirect(route('sistemaSalud.index'));
        }

        $sistemaSalud->fill($request->all());
        $sistemaSalud->save();

        Flash::success('Sistema Salud actualizado con éxito.');

        return redirect(route('sistemaSalud.index'));
    }

    /**
     * Remove the specified SistemaSalud from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            Flash::error('Sistema Salud no encontrado');

            return redirect(route('sistemaSalud.index'));
        }

        $sistemaSalud->delete();

        Flash::success('Sistema Salud deleted successfully.');

        return redirect(route('sistemaSalud.index'));
    }
}
