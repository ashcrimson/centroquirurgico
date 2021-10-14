<?php

namespace App\Http\Controllers;

use App\DataTables\diagnosticosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatediagnosticosRequest;
use App\Http\Requests\UpdatediagnosticosRequest;
use App\Models\diagnosticos;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class diagnosticosController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Diagnosticos')->only(['show']);
        $this->middleware('permission:Crear Diagnosticos')->only(['create','store']);
        $this->middleware('permission:Editar Diagnosticos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Diagnosticos')->only(['destroy']);
    }

    /**
     * Display a listing of the diagnosticos.
     *
     * @param diagnosticosDataTable $diagnosticosDataTable
     * @return Response
     */
    public function index(diagnosticosDataTable $diagnosticosDataTable)
    {
        return $diagnosticosDataTable->render('diagnosticos.index');
    }

    /**
     * Show the form for creating a new diagnosticos.
     *
     * @return Response
     */
    public function create()
    {
        return view('diagnosticos.create');
    }

    /**
     * Store a newly created diagnosticos in storage.
     *
     * @param CreatediagnosticosRequest $request
     *
     * @return Response
     */
    public function store(CreatediagnosticosRequest $request)
    {
        $input = $request->all();

        /** @var diagnosticos $diagnosticos */
        $diagnosticos = diagnosticos::create($input);

        Flash::success('Diagnosticos guardado exitosamente.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Display the specified diagnosticos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var diagnosticos $diagnosticos */
        $diagnosticos = diagnosticos::find($id);

        if (empty($diagnosticos)) {
            Flash::error('Diagnosticos no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.show')->with('diagnosticos', $diagnosticos);
    }

    /**
     * Show the form for editing the specified diagnosticos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var diagnosticos $diagnosticos */
        $diagnosticos = diagnosticos::find($id);

        if (empty($diagnosticos)) {
            Flash::error('Diagnosticos no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.edit')->with('diagnosticos', $diagnosticos);
    }

    /**
     * Update the specified diagnosticos in storage.
     *
     * @param  int              $id
     * @param UpdatediagnosticosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatediagnosticosRequest $request)
    {
        /** @var diagnosticos $diagnosticos */
        $diagnosticos = diagnosticos::find($id);

        if (empty($diagnosticos)) {
            Flash::error('Diagnosticos no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        $diagnosticos->fill($request->all());
        $diagnosticos->save();

        Flash::success('Diagnosticos actualizado con éxito.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Remove the specified diagnosticos from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var diagnosticos $diagnosticos */
        $diagnosticos = diagnosticos::find($id);

        if (empty($diagnosticos)) {
            Flash::error('Diagnosticos no encontrado');

            return redirect(route('diagnosticos.index'));
        }

        $diagnosticos->delete();

        Flash::success('Diagnosticos deleted successfully.');

        return redirect(route('diagnosticos.index'));
    }
}
