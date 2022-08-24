<?php

namespace App\Http\Controllers;

use App\DataTables\ParteDiagnosticoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteDiagnosticoRequest;
use App\Http\Requests\UpdateParteDiagnosticoRequest;
use App\Models\ParteDiagnostico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteDiagnosticoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Diagnosticos')->only(['show']);
        $this->middleware('permission:Crear Parte Diagnosticos')->only(['create','store']);
        $this->middleware('permission:Editar Parte Diagnosticos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Diagnosticos')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteDiagnostico.
     *
     * @param ParteDiagnosticoDataTable $parteDiagnosticoDataTable
     * @return Response
     */
    public function index(ParteDiagnosticoDataTable $parteDiagnosticoDataTable)
    {
        return $parteDiagnosticoDataTable->render('parte_diagnosticos.index');
    }

    /**
     * Show the form for creating a new ParteContacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_diagnosticos.create');
    }

    /**
     * Store a newly created ParteContacto in storage.
     *
     * @param CreateParteDiagnosticoRequest $request
     *
     * @return Response
     */
    public function store(CreateParteDiagnosticoRequest $request)
    {
        $input = $request->all();

        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::create($input);

        Flash::success('Diagnóstico guardado exitosamente.');

        return redirect(route('parteDiagnosticos.index'));
    }

    /**
     * Display the specified ParteDiagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            Flash::error('Diagnóstico no encontrado');

            return redirect(route('parteDiagnosticos.index'));
        }

        return view('parte_diagnosticos.show')->with('parteDiagnostico', $parteDiagnostico);
    }

    /**
     * Show the form for editing the specified ParteDiagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            Flash::error('Parte Diagnostico no encontrado');

            return redirect(route('parteDiagnosticos.index'));
        }

        return view('parte_diagnosticos.edit')->with('parteDiagnostico', $parteDiagnostico);
    }

    /**
     * Update the specified ParteDiagnostico in storage.
     *
     * @param  int              $id
     * @param UpdateParteDiagnosticoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteDiagnosticoRequest $request)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            Flash::error('Parte Diagnostico no encontrado');

            return redirect(route('parteDiagnosticos.index'));
        }

        $parteDiagnostico->fill($request->all());
        $parteDiagnostico->save();

        Flash::success('Diagnóstico actualizado con éxito.');

        return redirect(route('parteDiagnosticos.index'));
    }

    /**
     * Remove the specified ParteDiagnostico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            Flash::error('Parte Diagnostico no encontrado');

            return redirect(route('parteDiagnosticos.index'));
        }

        $parteDiagnostico->delete();

        Flash::success('Parte Diagnostico eliminado.');

        return redirect(route('parteDiagnosticos.index'));
    }
}
