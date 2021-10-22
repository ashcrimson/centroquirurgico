<?php

namespace App\Http\Controllers;

use App\DataTables\ContactoTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactoTipoRequest;
use App\Http\Requests\UpdateContactoTipoRequest;
use App\Models\ContactoTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactoTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Contacto Tipos')->only(['show']);
        $this->middleware('permission:Crear Contacto Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Contacto Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Contacto Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the ContactoTipo.
     *
     * @param ContactoTipoDataTable $contactoTipoDataTable
     * @return Response
     */
    public function index(ContactoTipoDataTable $contactoTipoDataTable)
    {
        return $contactoTipoDataTable->render('contacto_tipos.index');
    }

    /**
     * Show the form for creating a new ContactoTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacto_tipos.create');
    }

    /**
     * Store a newly created ContactoTipo in storage.
     *
     * @param CreateContactoTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateContactoTipoRequest $request)
    {
        $input = $request->all();

        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::create($input);

        Flash::success('Contacto Tipo guardado exitosamente.');

        return redirect(route('contactoTipos.index'));
    }

    /**
     * Display the specified ContactoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            Flash::error('Contacto Tipo no encontrado');

            return redirect(route('contactoTipos.index'));
        }

        return view('contacto_tipos.show')->with('contactoTipo', $contactoTipo);
    }

    /**
     * Show the form for editing the specified ContactoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            Flash::error('Contacto Tipo no encontrado');

            return redirect(route('contactoTipos.index'));
        }

        return view('contacto_tipos.edit')->with('contactoTipo', $contactoTipo);
    }

    /**
     * Update the specified ContactoTipo in storage.
     *
     * @param  int              $id
     * @param UpdateContactoTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactoTipoRequest $request)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            Flash::error('Contacto Tipo no encontrado');

            return redirect(route('contactoTipos.index'));
        }

        $contactoTipo->fill($request->all());
        $contactoTipo->save();

        Flash::success('Contacto Tipo actualizado con éxito.');

        return redirect(route('contactoTipos.index'));
    }

    /**
     * Remove the specified ContactoTipo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            Flash::error('Contacto Tipo no encontrado');

            return redirect(route('contactoTipos.index'));
        }

        $contactoTipo->delete();

        Flash::success('Contacto Tipo deleted successfully.');

        return redirect(route('contactoTipos.index'));
    }
}
