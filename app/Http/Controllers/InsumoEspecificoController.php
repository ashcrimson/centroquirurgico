<?php

namespace App\Http\Controllers;

use App\DataTables\InsumoEspecificoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInsumoEspecificoRequest;
use App\Http\Requests\UpdateInsumoEspecificoRequest;
use App\Models\InsumoEspecifico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InsumoEspecificoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Insumo Especificos')->only(['show']);
        $this->middleware('permission:Crear Insumo Especificos')->only(['create','store']);
        $this->middleware('permission:Editar Insumo Especificos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Insumo Especificos')->only(['destroy']);
    }

    /**
     * Display a listing of the InsumoEspecifico.
     *
     * @param InsumoEspecificoDataTable $insumoEspecificoDataTable
     * @return Response
     */
    public function index(InsumoEspecificoDataTable $insumoEspecificoDataTable)
    {
        return $insumoEspecificoDataTable->render('insumo_especificos.index');
    }

    /**
     * Show the form for creating a new InsumoEspecifico.
     *
     * @return Response
     */
    public function create()
    {
        return view('insumo_especificos.create');
    }

    /**
     * Store a newly created InsumoEspecifico in storage.
     *
     * @param CreateInsumoEspecificoRequest $request
     *
     * @return Response
     */
    public function store(CreateInsumoEspecificoRequest $request)
    {
        $input = $request->all();

        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::create($input);

        Flash::success('Insumo Especifico guardado exitosamente.');

        return redirect(route('insumoEspecificos.index'));
    }

    /**
     * Display the specified InsumoEspecifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            Flash::error('Insumo Especifico no encontrado');

            return redirect(route('insumoEspecificos.index'));
        }

        return view('insumo_especificos.show')->with('insumoEspecifico', $insumoEspecifico);
    }

    /**
     * Show the form for editing the specified InsumoEspecifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            Flash::error('Insumo Especifico no encontrado');

            return redirect(route('insumoEspecificos.index'));
        }

        return view('insumo_especificos.edit')->with('insumoEspecifico', $insumoEspecifico);
    }

    /**
     * Update the specified InsumoEspecifico in storage.
     *
     * @param  int              $id
     * @param UpdateInsumoEspecificoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInsumoEspecificoRequest $request)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            Flash::error('Insumo Especifico no encontrado');

            return redirect(route('insumoEspecificos.index'));
        }

        $insumoEspecifico->fill($request->all());
        $insumoEspecifico->save();

        Flash::success('Insumo Especifico actualizado con éxito.');

        return redirect(route('insumoEspecificos.index'));
    }

    /**
     * Remove the specified InsumoEspecifico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            Flash::error('Insumo Especifico no encontrado');

            return redirect(route('insumoEspecificos.index'));
        }

        $insumoEspecifico->delete();

        Flash::success('Insumo Especifico deleted successfully.');

        return redirect(route('insumoEspecificos.index'));
    }
}
