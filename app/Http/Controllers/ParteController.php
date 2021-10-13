<?php

namespace App\Http\Controllers;

use App\DataTables\ParteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteRequest;
use App\Http\Requests\UpdateParteRequest;
use App\Models\Parte;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Partes')->only(['show']);
        $this->middleware('permission:Crear Partes')->only(['create','store']);
        $this->middleware('permission:Editar Partes')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Partes')->only(['destroy']);
    }

    /**
     * Display a listing of the Parte.
     *
     * @param ParteDataTable $parteDataTable
     * @return Response
     */
    public function index(ParteDataTable $parteDataTable)
    {
        return $parteDataTable->render('partes.index');
    }

    /**
     * Show the form for creating a new Parte.
     *
     * @return Response
     */
    public function create()
    {
        return view('partes.create');
    }

    /**
     * Store a newly created Parte in storage.
     *
     * @param CreateParteRequest $request
     *
     * @return Response
     */
    public function store(CreateParteRequest $request)
    {
        $input = $request->all();

        /** @var Parte $parte */
        $parte = Parte::create($input);

        Flash::success('Parte guardado exitosamente.');

        return redirect(route('partes.index'));
    }

    /**
     * Display the specified Parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.show')->with('parte', $parte);
    }

    /**
     * Show the form for editing the specified Parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        return view('partes.edit')->with('parte', $parte);
    }

    /**
     * Update the specified Parte in storage.
     *
     * @param  int              $id
     * @param UpdateParteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteRequest $request)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        $parte->fill($request->all());
        $parte->save();

        Flash::success('Parte actualizado con éxito.');

        return redirect(route('partes.index'));
    }

    /**
     * Remove the specified Parte from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte no encontrado');

            return redirect(route('partes.index'));
        }

        $parte->delete();

        Flash::success('Parte deleted successfully.');

        return redirect(route('partes.index'));
    }
}
