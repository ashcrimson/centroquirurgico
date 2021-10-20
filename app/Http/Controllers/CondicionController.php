<?php

namespace App\Http\Controllers;

use App\DataTables\CondicionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCondicionRequest;
use App\Http\Requests\UpdateCondicionRequest;
use App\Models\Condicion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CondicionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Condicions')->only(['show']);
        $this->middleware('permission:Crear Condicions')->only(['create','store']);
        $this->middleware('permission:Editar Condicions')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Condicions')->only(['destroy']);
    }

    /**
     * Display a listing of the Condicion.
     *
     * @param CondicionDataTable $condicionDataTable
     * @return Response
     */
    public function index(CondicionDataTable $condicionDataTable)
    {
        return $condicionDataTable->render('condicions.index');
    }

    /**
     * Show the form for creating a new Condicion.
     *
     * @return Response
     */
    public function create()
    {
        return view('condicions.create');
    }

    /**
     * Store a newly created Condicion in storage.
     *
     * @param CreateCondicionRequest $request
     *
     * @return Response
     */
    public function store(CreateCondicionRequest $request)
    {
        $input = $request->all();

        /** @var Condicion $condicion */
        $condicion = Condicion::create($input);

        Flash::success('Condicion guardado exitosamente.');

        return redirect(route('condicions.index'));
    }

    /**
     * Display the specified Condicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Condicion $condicion */
        $condicion = Condicion::find($id);

        if (empty($condicion)) {
            Flash::error('Condicion no encontrado');

            return redirect(route('condicions.index'));
        }

        return view('condicions.show')->with('condicion', $condicion);
    }

    /**
     * Show the form for editing the specified Condicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Condicion $condicion */
        $condicion = Condicion::find($id);

        if (empty($condicion)) {
            Flash::error('Condicion no encontrado');

            return redirect(route('condicions.index'));
        }

        return view('condicions.edit')->with('condicion', $condicion);
    }

    /**
     * Update the specified Condicion in storage.
     *
     * @param  int              $id
     * @param UpdateCondicionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCondicionRequest $request)
    {
        /** @var Condicion $condicion */
        $condicion = Condicion::find($id);

        if (empty($condicion)) {
            Flash::error('Condicion no encontrado');

            return redirect(route('condicions.index'));
        }

        $condicion->fill($request->all());
        $condicion->save();

        Flash::success('Condicion actualizado con éxito.');

        return redirect(route('condicions.index'));
    }

    /**
     * Remove the specified Condicion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Condicion $condicion */
        $condicion = Condicion::find($id);

        if (empty($condicion)) {
            Flash::error('Condicion no encontrado');

            return redirect(route('condicions.index'));
        }

        $condicion->delete();

        Flash::success('Condicion deleted successfully.');

        return redirect(route('condicions.index'));
    }
}
