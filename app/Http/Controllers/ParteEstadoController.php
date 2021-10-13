<?php

namespace App\Http\Controllers;

use App\DataTables\ParteEstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteEstadoRequest;
use App\Http\Requests\UpdateParteEstadoRequest;
use App\Models\ParteEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteEstadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Estados')->only(['show']);
        $this->middleware('permission:Crear Parte Estados')->only(['create','store']);
        $this->middleware('permission:Editar Parte Estados')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Estados')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteEstado.
     *
     * @param ParteEstadoDataTable $parteEstadoDataTable
     * @return Response
     */
    public function index(ParteEstadoDataTable $parteEstadoDataTable)
    {
        return $parteEstadoDataTable->render('parte_estados.index');
    }

    /**
     * Show the form for creating a new ParteEstado.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_estados.create');
    }

    /**
     * Store a newly created ParteEstado in storage.
     *
     * @param CreateParteEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreateParteEstadoRequest $request)
    {
        $input = $request->all();

        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::create($input);

        Flash::success('Parte Estado guardado exitosamente.');

        return redirect(route('parteEstados.index'));
    }

    /**
     * Display the specified ParteEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            Flash::error('Parte Estado no encontrado');

            return redirect(route('parteEstados.index'));
        }

        return view('parte_estados.show')->with('parteEstado', $parteEstado);
    }

    /**
     * Show the form for editing the specified ParteEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            Flash::error('Parte Estado no encontrado');

            return redirect(route('parteEstados.index'));
        }

        return view('parte_estados.edit')->with('parteEstado', $parteEstado);
    }

    /**
     * Update the specified ParteEstado in storage.
     *
     * @param  int              $id
     * @param UpdateParteEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteEstadoRequest $request)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            Flash::error('Parte Estado no encontrado');

            return redirect(route('parteEstados.index'));
        }

        $parteEstado->fill($request->all());
        $parteEstado->save();

        Flash::success('Parte Estado actualizado con éxito.');

        return redirect(route('parteEstados.index'));
    }

    /**
     * Remove the specified ParteEstado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            Flash::error('Parte Estado no encontrado');

            return redirect(route('parteEstados.index'));
        }

        $parteEstado->delete();

        Flash::success('Parte Estado deleted successfully.');

        return redirect(route('parteEstados.index'));
    }
}
