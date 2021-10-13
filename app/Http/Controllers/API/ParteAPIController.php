<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteAPIRequest;
use App\Http\Requests\API\UpdateParteAPIRequest;
use App\Models\Parte;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteController
 * @package App\Http\Controllers\API
 */

class ParteAPIController extends AppBaseController
{
    /**
     * Display a listing of the Parte.
     * GET|HEAD /partes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Parte::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $partes = $query->get();

        return $this->sendResponse($partes->toArray(), 'Partes retrieved successfully');
    }

    /**
     * Store a newly created Parte in storage.
     * POST /partes
     *
     * @param CreateParteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Parte $parte */
        $parte = Parte::create($input);

        return $this->sendResponse($parte->toArray(), 'Parte guardado exitosamente');
    }

    /**
     * Display the specified Parte.
     * GET|HEAD /partes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            return $this->sendError('Parte no encontrado');
        }

        return $this->sendResponse($parte->toArray(), 'Parte retrieved successfully');
    }

    /**
     * Update the specified Parte in storage.
     * PUT/PATCH /partes/{id}
     *
     * @param int $id
     * @param UpdateParteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteAPIRequest $request)
    {
        /** @var Parte $parte */
        $parte = Parte::find($id);

        if (empty($parte)) {
            return $this->sendError('Parte no encontrado');
        }

        $parte->fill($request->all());
        $parte->save();

        return $this->sendResponse($parte->toArray(), 'Parte actualizado con éxito');
    }

    /**
     * Remove the specified Parte from storage.
     * DELETE /partes/{id}
     *
     * @param int $id
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
            return $this->sendError('Parte no encontrado');
        }

        $parte->delete();

        return $this->sendSuccess('Parte deleted successfully');
    }
}
