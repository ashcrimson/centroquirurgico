<?php

namespace App\Http\Controllers;

use App\DataTables\SistemasaludDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSistemasaludRequest;
use App\Http\Requests\UpdateSistemasaludRequest;
use App\Models\Sistemasalud;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SistemasaludController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Sistemasaluds')->only(['show']);
        $this->middleware('permission:Crear Sistemasaluds')->only(['create','store']);
        $this->middleware('permission:Editar Sistemasaluds')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Sistemasaluds')->only(['destroy']);
    }

    /**
     * Display a listing of the Sistemasalud.
     *
     * @param SistemasaludDataTable $sistemasaludDataTable
     * @return Response
     */
    public function index(SistemasaludDataTable $sistemasaludDataTable)
    {
        return $sistemasaludDataTable->render('sistemasaluds.index');
    }

    /**
     * Show the form for creating a new Sistemasalud.
     *
     * @return Response
     */
    public function create()
    {
        return view('sistemasaluds.create');
    }

    /**
     * Store a newly created Sistemasalud in storage.
     *
     * @param CreateSistemasaludRequest $request
     *
     * @return Response
     */
    public function store(CreateSistemasaludRequest $request)
    {
        $input = $request->all();

        /** @var Sistemasalud $sistemasalud */
        $sistemasalud = Sistemasalud::create($input);

        Flash::success('Sistemasalud guardado exitosamente.');

        return redirect(route('sistemasaluds.index'));
    }

    /**
     * Display the specified Sistemasalud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sistemasalud $sistemasalud */
        $sistemasalud = Sistemasalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('Sistemasalud no encontrado');

            return redirect(route('sistemasaluds.index'));
        }

        return view('sistemasaluds.show')->with('sistemasalud', $sistemasalud);
    }

    /**
     * Show the form for editing the specified Sistemasalud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Sistemasalud $sistemasalud */
        $sistemasalud = Sistemasalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('Sistemasalud no encontrado');

            return redirect(route('sistemasaluds.index'));
        }

        return view('sistemasaluds.edit')->with('sistemasalud', $sistemasalud);
    }

    /**
     * Update the specified Sistemasalud in storage.
     *
     * @param  int              $id
     * @param UpdateSistemasaludRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSistemasaludRequest $request)
    {
        /** @var Sistemasalud $sistemasalud */
        $sistemasalud = Sistemasalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('Sistemasalud no encontrado');

            return redirect(route('sistemasaluds.index'));
        }

        $sistemasalud->fill($request->all());
        $sistemasalud->save();

        Flash::success('Sistemasalud actualizado con éxito.');

        return redirect(route('sistemasaluds.index'));
    }

    /**
     * Remove the specified Sistemasalud from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sistemasalud $sistemasalud */
        $sistemasalud = Sistemasalud::find($id);

        if (empty($sistemasalud)) {
            Flash::error('Sistemasalud no encontrado');

            return redirect(route('sistemasaluds.index'));
        }

        $sistemasalud->delete();

        Flash::success('Sistemasalud deleted successfully.');

        return redirect(route('sistemasaluds.index'));
    }
}
