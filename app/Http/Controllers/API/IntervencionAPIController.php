<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIntervencionAPIRequest;
use App\Http\Requests\API\UpdateIntervencionAPIRequest;
use App\Models\Intervencion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IntervencionController
 * @package App\Http\Controllers\API
 */

class IntervencionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Intervencion.
     * GET|HEAD /intervenciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Intervencion::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $intervenciones = $query->get();

        return $this->sendResponse($intervenciones->toArray(), 'intervenciones retrieved successfully');
    }

    /**
     * Store a newly created Intervencion in storage.
     * POST /intervenciones
     *
     * @param CreateIntervencionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervencionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::create($input);

        return $this->sendResponse($intervencion->toArray(), 'Intervencion guardado exitosamente');
    }

    /**
     * Display the specified Intervencion.
     * GET|HEAD /intervenciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            return $this->sendError('Intervencion no encontrado');
        }

        return $this->sendResponse($intervencion->toArray(), 'Intervencion retrieved successfully');
    }

    /**
     * Update the specified Intervencion in storage.
     * PUT/PATCH /intervenciones/{id}
     *
     * @param int $id
     * @param UpdateIntervencionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervencionAPIRequest $request)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            return $this->sendError('Intervencion no encontrado');
        }

        $intervencion->fill($request->all());
        $intervencion->save();

        return $this->sendResponse($intervencion->toArray(), 'Intervencion actualizado con éxito');
    }

    /**
     * Remove the specified Intervencion from storage.
     * DELETE /intervenciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            return $this->sendError('Intervencion no encontrado');
        }

        $intervencion->delete();

        return $this->sendSuccess('Intervencion deleted successfully');
    }
}
