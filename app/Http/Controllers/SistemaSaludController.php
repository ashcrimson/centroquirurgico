<?php

namespace App\Http\Controllers;

use App\DataTables\SistemasaludDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSistemasaludRequest;
use App\Http\Requests\UpdateSistemasaludRequest;
use App\Models\SistemaSalud;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SistemaSaludController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver sistemasalud')->only(['show']);
        $this->middleware('permission:Crear sistemasalud')->only(['create','store']);
        $this->middleware('permission:Editar sistemasalud')->only(['edit','update',]);
        $this->middleware('permission:Eliminar sistemasalud')->only(['destroy']);
    }

    /**
     * Display a listing of the SistemaSalud.
     *
     * @param SistemasaludDataTable $sistemasaludDataTable
     * @return Response
     */
    public function index(SistemasaludDataTable $sistemasaludDataTable)
    {
        return $sistemasaludDataTable->render('sistemasalud.index');
    }

    /**
     * Show the form for creating a new SistemaSalud.
     *
     * @return Response
     */
    public function create()
    {
        return view('sistemasalud.create');
    }

    /**
     * Store a newly created SistemaSalud in storage.
     *
     * @param CreateSistemasaludRequest $request
     *
     * @return Response
     */
    public function store(CreateSistemasaludRequest $request)
    {
        $input = $request->all();

        /** @var SistemaSalud $sistemasalud */
        $sistemasalud = SistemaSalud::create($input);

        Flash::success('SistemaSalud guardado exitosamente.');

        return redirect(route('sistemasalud.index'));
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
        /** @var SistemaSalud $sistemasalud */
        $sistemasalud = SistemaSalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('SistemaSalud no encontrado');

            return redirect(route('sistemasalud.index'));
        }

        return view('sistemasalud.show')->with('sistemasalud', $sistemasalud);
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
        /** @var SistemaSalud $sistemasalud */
        $sistemasalud = SistemaSalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('SistemaSalud no encontrado');

            return redirect(route('sistemasalud.index'));
        }

        return view('sistemasalud.edit')->with('sistemasalud', $sistemasalud);
    }

    /**
     * Update the specified SistemaSalud in storage.
     *
     * @param  int              $id
     * @param UpdateSistemasaludRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSistemasaludRequest $request)
    {
        /** @var SistemaSalud $sistemasalud */
        $sistemasalud = SistemaSalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('SistemaSalud no encontrado');

            return redirect(route('sistemasalud.index'));
        }

        $sistemasalud->fill($request->all());
        $sistemasalud->save();

        Flash::success('SistemaSalud actualizado con éxito.');

        return redirect(route('sistemasalud.index'));
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
        /** @var SistemaSalud $sistemasalud */
        $sistemasalud = SistemaSalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('SistemaSalud no encontrado');

            return redirect(route('sistemasalud.index'));
        }

        $sistemasalud->delete();

        Flash::success('SistemaSalud deleted successfully.');

        return redirect(route('sistemasalud.index'));
    }
}
