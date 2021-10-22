<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInsumoEspecificoAPIRequest;
use App\Http\Requests\API\UpdateInsumoEspecificoAPIRequest;
use App\Models\InsumoEspecifico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InsumoEspecificoController
 * @package App\Http\Controllers\API
 */

class InsumoEspecificoAPIController extends AppBaseController
{
    /**
     * Display a listing of the InsumoEspecifico.
     * GET|HEAD /insumoEspecificos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = InsumoEspecifico::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $insumoEspecificos = $query->get();

        return $this->sendResponse($insumoEspecificos->toArray(), 'Insumo Especificos retrieved successfully');
    }

    /**
     * Store a newly created InsumoEspecifico in storage.
     * POST /insumoEspecificos
     *
     * @param CreateInsumoEspecificoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInsumoEspecificoAPIRequest $request)
    {
        $input = $request->all();

        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::create($input);

        return $this->sendResponse($insumoEspecifico->toArray(), 'Insumo Especifico guardado exitosamente');
    }

    /**
     * Display the specified InsumoEspecifico.
     * GET|HEAD /insumoEspecificos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            return $this->sendError('Insumo Especifico no encontrado');
        }

        return $this->sendResponse($insumoEspecifico->toArray(), 'Insumo Especifico retrieved successfully');
    }

    /**
     * Update the specified InsumoEspecifico in storage.
     * PUT/PATCH /insumoEspecificos/{id}
     *
     * @param int $id
     * @param UpdateInsumoEspecificoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInsumoEspecificoAPIRequest $request)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            return $this->sendError('Insumo Especifico no encontrado');
        }

        $insumoEspecifico->fill($request->all());
        $insumoEspecifico->save();

        return $this->sendResponse($insumoEspecifico->toArray(), 'InsumoEspecifico actualizado con éxito');
    }

    /**
     * Remove the specified InsumoEspecifico from storage.
     * DELETE /insumoEspecificos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InsumoEspecifico $insumoEspecifico */
        $insumoEspecifico = InsumoEspecifico::find($id);

        if (empty($insumoEspecifico)) {
            return $this->sendError('Insumo Especifico no encontrado');
        }

        $insumoEspecifico->delete();

        return $this->sendSuccess('Insumo Especifico deleted successfully');
    }
}
