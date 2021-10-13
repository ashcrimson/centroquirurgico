<?php

namespace App\Http\Controllers;

use App\DataTables\PreoperatorioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePreoperatorioRequest;
use App\Http\Requests\UpdatePreoperatorioRequest;
use App\Models\Preoperatorio;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreoperatorioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Preoperatorios')->only(['show']);
        $this->middleware('permission:Crear Preoperatorios')->only(['create','store']);
        $this->middleware('permission:Editar Preoperatorios')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Preoperatorios')->only(['destroy']);
    }

    /**
     * Display a listing of the Preoperatorio.
     *
     * @param PreoperatorioDataTable $preoperatorioDataTable
     * @return Response
     */
    public function index(PreoperatorioDataTable $preoperatorioDataTable)
    {
        return $preoperatorioDataTable->render('preoperatorios.index');
    }

    /**
     * Show the form for creating a new Preoperatorio.
     *
     * @return Response
     */
    public function create()
    {
        return view('preoperatorios.create');
    }

    /**
     * Store a newly created Preoperatorio in storage.
     *
     * @param CreatePreoperatorioRequest $request
     *
     * @return Response
     */
    public function store(CreatePreoperatorioRequest $request)
    {
        $input = $request->all();

        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::create($input);

        Flash::success('Preoperatorio guardado exitosamente.');

        return redirect(route('preoperatorios.index'));
    }

    /**
     * Display the specified Preoperatorio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            Flash::error('Preoperatorio no encontrado');

            return redirect(route('preoperatorios.index'));
        }

        return view('preoperatorios.show')->with('preoperatorio', $preoperatorio);
    }

    /**
     * Show the form for editing the specified Preoperatorio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            Flash::error('Preoperatorio no encontrado');

            return redirect(route('preoperatorios.index'));
        }

        return view('preoperatorios.edit')->with('preoperatorio', $preoperatorio);
    }

    /**
     * Update the specified Preoperatorio in storage.
     *
     * @param  int              $id
     * @param UpdatePreoperatorioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreoperatorioRequest $request)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            Flash::error('Preoperatorio no encontrado');

            return redirect(route('preoperatorios.index'));
        }

        $preoperatorio->fill($request->all());
        $preoperatorio->save();

        Flash::success('Preoperatorio actualizado con éxito.');

        return redirect(route('preoperatorios.index'));
    }

    /**
     * Remove the specified Preoperatorio from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            Flash::error('Preoperatorio no encontrado');

            return redirect(route('preoperatorios.index'));
        }

        $preoperatorio->delete();

        Flash::success('Preoperatorio deleted successfully.');

        return redirect(route('preoperatorios.index'));
    }
}
