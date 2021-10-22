<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConvenioAPIRequest;
use App\Http\Requests\API\UpdateConvenioAPIRequest;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConvenioController
 * @package App\Http\Controllers\API
 */

class ConvenioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Convenio.
     * GET|HEAD /convenios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Convenio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $convenios = $query->get();

        return $this->sendResponse($convenios->toArray(), 'Convenios retrieved successfully');
    }

    /**
     * Store a newly created Convenio in storage.
     * POST /convenios
     *
     * @param CreateConvenioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConvenioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Convenio $convenio */
        $convenio = Convenio::create($input);

        return $this->sendResponse($convenio->toArray(), 'Convenio guardado exitosamente');
    }

    /**
     * Display the specified Convenio.
     * GET|HEAD /convenios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio no encontrado');
        }

        return $this->sendResponse($convenio->toArray(), 'Convenio retrieved successfully');
    }

    /**
     * Update the specified Convenio in storage.
     * PUT/PATCH /convenios/{id}
     *
     * @param int $id
     * @param UpdateConvenioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConvenioAPIRequest $request)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio no encontrado');
        }

        $convenio->fill($request->all());
        $convenio->save();

        return $this->sendResponse($convenio->toArray(), 'Convenio actualizado con éxito');
    }

    /**
     * Remove the specified Convenio from storage.
     * DELETE /convenios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Convenio $convenio */
        $convenio = Convenio::find($id);

        if (empty($convenio)) {
            return $this->sendError('Convenio no encontrado');
        }

        $convenio->delete();

        return $this->sendSuccess('Convenio deleted successfully');
    }
}
