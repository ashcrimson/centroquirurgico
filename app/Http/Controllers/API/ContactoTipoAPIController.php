<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactoTipoAPIRequest;
use App\Http\Requests\API\UpdateContactoTipoAPIRequest;
use App\Models\ContactoTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContactoTipoController
 * @package App\Http\Controllers\API
 */

class ContactoTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ContactoTipo.
     * GET|HEAD /contactoTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ContactoTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $contactoTipos = $query->get();

        return $this->sendResponse($contactoTipos->toArray(), 'Contacto Tipos retrieved successfully');
    }

    /**
     * Store a newly created ContactoTipo in storage.
     * POST /contactoTipos
     *
     * @param CreateContactoTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContactoTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::create($input);

        return $this->sendResponse($contactoTipo->toArray(), 'Contacto Tipo guardado exitosamente');
    }

    /**
     * Display the specified ContactoTipo.
     * GET|HEAD /contactoTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            return $this->sendError('Contacto Tipo no encontrado');
        }

        return $this->sendResponse($contactoTipo->toArray(), 'Contacto Tipo retrieved successfully');
    }

    /**
     * Update the specified ContactoTipo in storage.
     * PUT/PATCH /contactoTipos/{id}
     *
     * @param int $id
     * @param UpdateContactoTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactoTipoAPIRequest $request)
    {
        /** @var ContactoTipo $contactoTipo */
        $contactoTipo = ContactoTipo::find($id);

        if (empty($contactoTipo)) {
            return $this->sendError('Contacto Tipo no encontrado');
        }

        $contactoTipo->fill($request->all());
        $contactoTipo->save();

        return $this->sendResponse($contactoTipo->toArray(), 'ContactoTipo actualizado con éxito');
    }

    /**
     * Remove the specified ContactoTipo from storage.
     * DELETE /contactoTipos/{id}
     *
     * @param int $id
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
            return $this->sendError('Contacto Tipo no encontrado');
        }

        $contactoTipo->delete();

        return $this->sendSuccess('Contacto Tipo deleted successfully');
    }
}
