<?php

namespace App\Http\Controllers;

use App\DataTables\CirugiaTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCirugiaTipoRequest;
use App\Http\Requests\UpdateCirugiaTipoRequest;
use App\Models\CirugiaTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CirugiaTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Cirugia Tipos')->only(['show']);
        $this->middleware('permission:Crear Cirugia Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Cirugia Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Cirugia Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the CirugiaTipo.
     *
     * @param CirugiaTipoDataTable $cirugiaTipoDataTable
     * @return Response
     */
    public function index(CirugiaTipoDataTable $cirugiaTipoDataTable)
    {
        return $cirugiaTipoDataTable->render('cirugia_tipos.index');
    }

    /**
     * Show the form for creating a new CirugiaTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('cirugia_tipos.create');
    }

    /**
     * Store a newly created CirugiaTipo in storage.
     *
     * @param CreateCirugiaTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateCirugiaTipoRequest $request)
    {
        $input = $request->all();

        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::create($input);

        Flash::success('Cirugia Tipo guardado exitosamente.');

        return redirect(route('cirugiaTipos.index'));
    }

    /**
     * Display the specified CirugiaTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            Flash::error('Cirugia Tipo no encontrado');

            return redirect(route('cirugiaTipos.index'));
        }

        return view('cirugia_tipos.show')->with('cirugiaTipo', $cirugiaTipo);
    }

    /**
     * Show the form for editing the specified CirugiaTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            Flash::error('Cirugia Tipo no encontrado');

            return redirect(route('cirugiaTipos.index'));
        }

        return view('cirugia_tipos.edit')->with('cirugiaTipo', $cirugiaTipo);
    }

    /**
     * Update the specified CirugiaTipo in storage.
     *
     * @param  int              $id
     * @param UpdateCirugiaTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCirugiaTipoRequest $request)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            Flash::error('Cirugia Tipo no encontrado');

            return redirect(route('cirugiaTipos.index'));
        }

        $cirugiaTipo->fill($request->all());
        $cirugiaTipo->save();

        Flash::success('Cirugia Tipo actualizado con éxito.');

        return redirect(route('cirugiaTipos.index'));
    }

    /**
     * Remove the specified CirugiaTipo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            Flash::error('Cirugia Tipo no encontrado');

            return redirect(route('cirugiaTipos.index'));
        }

        $cirugiaTipo->delete();

        Flash::success('Cirugia Tipo deleted successfully.');

        return redirect(route('cirugiaTipos.index'));
    }
}
