<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGrupoBaseAPIRequest;
use App\Http\Requests\API\UpdateGrupoBaseAPIRequest;
use App\Models\GrupoBase;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GrupoBaseController
 * @package App\Http\Controllers\API
 */

class GrupoBaseAPIController extends AppBaseController
{
    /**
     * Display a listing of the GrupoBase.
     * GET|HEAD /grupoBases
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = GrupoBase::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $grupoBases = $query->get();

        return $this->sendResponse($grupoBases->toArray(), 'Grupo Bases retrieved successfully');
    }

    /**
     * Store a newly created GrupoBase in storage.
     * POST /grupoBases
     *
     * @param CreateGrupoBaseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGrupoBaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::create($input);

        return $this->sendResponse($grupoBase->toArray(), 'Grupo Base guardado exitosamente');
    }

    /**
     * Display the specified GrupoBase.
     * GET|HEAD /grupoBases/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            return $this->sendError('Grupo Base no encontrado');
        }

        return $this->sendResponse($grupoBase->toArray(), 'Grupo Base retrieved successfully');
    }

    /**
     * Update the specified GrupoBase in storage.
     * PUT/PATCH /grupoBases/{id}
     *
     * @param int $id
     * @param UpdateGrupoBaseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrupoBaseAPIRequest $request)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            return $this->sendError('Grupo Base no encontrado');
        }

        $grupoBase->fill($request->all());
        $grupoBase->save();

        return $this->sendResponse($grupoBase->toArray(), 'GrupoBase actualizado con éxito');
    }

    /**
     * Remove the specified GrupoBase from storage.
     * DELETE /grupoBases/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GrupoBase $grupoBase */
        $grupoBase = GrupoBase::find($id);

        if (empty($grupoBase)) {
            return $this->sendError('Grupo Base no encontrado');
        }

        $grupoBase->delete();

        return $this->sendSuccess('Grupo Base deleted successfully');
    }
}
