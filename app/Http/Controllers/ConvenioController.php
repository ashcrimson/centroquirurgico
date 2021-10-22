<?php

namespace App\Http\Controllers;

use App\DataTables\ConvenioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConvenioRequest;
use App\Http\Requests\UpdateConvenioRequest;
use App\Models\Convenio;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConvenioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Convenios')->only(['show']);
        $this->middleware('permission:Crear Convenios')->only(['create','store']);
        $this->middleware('permission:Editar Convenios')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Convenios')->only(['destroy']);
    }

    /**
     * Display a listing of the Convenio.
     *
     * @param ConvenioDataTable $convenioDataTable
     * @return Response
     */
    public function index(ConvenioDataTable $convenioDataTable)
    {
        return $convenioDataTable->render('convenios.index');
    }

    /**
     * Show the form for creating a new Convenio.
     *
     * @return Response
     */
    public function create()
    {
        return view('convenios.create');
    }

    /**
     * Store a newly created Convenio in storage.
     *
     * @param CreateConvenioRequest $request
     *
     * @return Response
     */
    public function store(CreateConvenioRequest $request)
    {
        $input = $request->all();

        /** @var Convenio $convenio */
        $convenio = Convenio::create($input);

        Flash::success('Convenio guardado exitosamente.');

        return redirect(route('convenios.index'));
    }

    /**
     * Display the specified Convenio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            Flash::error('Convenio no encontrado');

            return redirect(route('convenios.index'));
        }

        return view('convenios.show')->with('convenio', $convenio);
    }

    /**
     * Show the form for editing the specified Convenio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            Flash::error('Convenio no encontrado');

            return redirect(route('convenios.index'));
        }

        return view('convenios.edit')->with('convenio', $convenio);
    }

    /**
     * Update the specified Convenio in storage.
     *
     * @param  int              $id
     * @param UpdateConvenioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConvenioRequest $request)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            Flash::error('Convenio no encontrado');

            return redirect(route('convenios.index'));
        }

        $convenio->fill($request->all());
        $convenio->save();

        Flash::success('Convenio actualizado con éxito.');

        return redirect(route('convenios.index'));
    }

    /**
     * Remove the specified Convenio from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            Flash::error('Convenio no encontrado');

            return redirect(route('convenios.index'));
        }

        $convenio->delete();

        Flash::success('Convenio deleted successfully.');

        return redirect(route('convenios.index'));
    }
}
