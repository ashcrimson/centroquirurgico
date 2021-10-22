<?php

namespace App\Http\Controllers;

use App\DataTables\ParteContactoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteContactoRequest;
use App\Http\Requests\UpdateParteContactoRequest;
use App\Models\ParteContacto;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteContactoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Contactos')->only(['show']);
        $this->middleware('permission:Crear Parte Contactos')->only(['create','store']);
        $this->middleware('permission:Editar Parte Contactos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Contactos')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteContacto.
     *
     * @param ParteContactoDataTable $parteContactoDataTable
     * @return Response
     */
    public function index(ParteContactoDataTable $parteContactoDataTable)
    {
        return $parteContactoDataTable->render('parte_contactos.index');
    }

    /**
     * Show the form for creating a new ParteContacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_contactos.create');
    }

    /**
     * Store a newly created ParteContacto in storage.
     *
     * @param CreateParteContactoRequest $request
     *
     * @return Response
     */
    public function store(CreateParteContactoRequest $request)
    {
        $input = $request->all();

        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::create($input);

        Flash::success('Parte Contacto guardado exitosamente.');

        return redirect(route('parteContactos.index'));
    }

    /**
     * Display the specified ParteContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            Flash::error('Parte Contacto no encontrado');

            return redirect(route('parteContactos.index'));
        }

        return view('parte_contactos.show')->with('parteContacto', $parteContacto);
    }

    /**
     * Show the form for editing the specified ParteContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            Flash::error('Parte Contacto no encontrado');

            return redirect(route('parteContactos.index'));
        }

        return view('parte_contactos.edit')->with('parteContacto', $parteContacto);
    }

    /**
     * Update the specified ParteContacto in storage.
     *
     * @param  int              $id
     * @param UpdateParteContactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteContactoRequest $request)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            Flash::error('Parte Contacto no encontrado');

            return redirect(route('parteContactos.index'));
        }

        $parteContacto->fill($request->all());
        $parteContacto->save();

        Flash::success('Parte Contacto actualizado con éxito.');

        return redirect(route('parteContactos.index'));
    }

    /**
     * Remove the specified ParteContacto from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            Flash::error('Parte Contacto no encontrado');

            return redirect(route('parteContactos.index'));
        }

        $parteContacto->delete();

        Flash::success('Parte Contacto deleted successfully.');

        return redirect(route('parteContactos.index'));
    }
}
