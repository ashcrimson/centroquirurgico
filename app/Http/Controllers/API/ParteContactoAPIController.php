<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteContactoAPIRequest;
use App\Http\Requests\API\UpdateParteContactoAPIRequest;
use App\Models\ParteContacto;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteContactoController
 * @package App\Http\Controllers\API
 */

class ParteContactoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteContacto.
     * GET|HEAD /parteContactos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteContacto::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $parteContactos = $query->get();

        return $this->sendResponse($parteContactos->toArray(), 'Parte Contactos retrieved successfully');
    }

    /**
     * Store a newly created ParteContacto in storage.
     * POST /parteContactos
     *
     * @param CreateParteContactoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteContactoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::create($input);

        return $this->sendResponse($parteContacto->toArray(), 'Parte Contacto guardado exitosamente');
    }

    /**
     * Display the specified ParteContacto.
     * GET|HEAD /parteContactos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            return $this->sendError('Parte Contacto no encontrado');
        }

        return $this->sendResponse($parteContacto->toArray(), 'Parte Contacto retrieved successfully');
    }

    /**
     * Update the specified ParteContacto in storage.
     * PUT/PATCH /parteContactos/{id}
     *
     * @param int $id
     * @param UpdateParteContactoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteContactoAPIRequest $request)
    {
        /** @var ParteContacto $parteContacto */
        $parteContacto = ParteContacto::find($id);

        if (empty($parteContacto)) {
            return $this->sendError('Parte Contacto no encontrado');
        }

        $parteContacto->fill($request->all());
        $parteContacto->save();

        return $this->sendResponse($parteContacto->toArray(), 'ParteContacto actualizado con éxito');
    }

    /**
     * Remove the specified ParteContacto from storage.
     * DELETE /parteContactos/{id}
     *
     * @param int $id
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
            return $this->sendError('Parte Contacto no encontrado');
        }

        $parteContacto->delete();

        return $this->sendSuccess('Parte Contacto deleted successfully');
    }
}
