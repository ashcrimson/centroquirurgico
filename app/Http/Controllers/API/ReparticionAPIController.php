<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReparticionAPIRequest;
use App\Http\Requests\API\UpdateReparticionAPIRequest;
use App\Models\Reparticion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReparticionController
 * @package App\Http\Controllers\API
 */

class ReparticionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Reparticion.
     * GET|HEAD /reparticions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Reparticion::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $reparticions = $query->get();

        return $this->sendResponse($reparticions->toArray(), 'Reparticions retrieved successfully');
    }

    /**
     * Store a newly created Reparticion in storage.
     * POST /reparticions
     *
     * @param CreateReparticionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReparticionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::create($input);

        return $this->sendResponse($reparticion->toArray(), 'Reparticion guardado exitosamente');
    }

    /**
     * Display the specified Reparticion.
     * GET|HEAD /reparticions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            return $this->sendError('Reparticion no encontrado');
        }

        return $this->sendResponse($reparticion->toArray(), 'Reparticion retrieved successfully');
    }

    /**
     * Update the specified Reparticion in storage.
     * PUT/PATCH /reparticions/{id}
     *
     * @param int $id
     * @param UpdateReparticionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReparticionAPIRequest $request)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            return $this->sendError('Reparticion no encontrado');
        }

        $reparticion->fill($request->all());
        $reparticion->save();

        return $this->sendResponse($reparticion->toArray(), 'Reparticion actualizado con éxito');
    }

    /**
     * Remove the specified Reparticion from storage.
     * DELETE /reparticions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Reparticion $reparticion */
        $reparticion = Reparticion::find($id);

        if (empty($reparticion)) {
            return $this->sendError('Reparticion no encontrado');
        }

        $reparticion->delete();

        return $this->sendSuccess('Reparticion deleted successfully');
    }
}
