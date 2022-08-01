<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteHistoricoAPIRequest;
use App\Http\Requests\API\UpdateParteHistoricoAPIRequest;
use App\Models\ParteHistorico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteHistoricoController
 * @package App\Http\Controllers\API
 */

class ParteHistoricoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteHistorico.
     * GET|HEAD /parteHistoricos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteHistorico::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $parteHistoricos = $query->get();

        return $this->sendResponse($parteHistoricos->toArray(), 'Parte Historicos retrieved successfully');
    }

    /**
     * Store a newly created ParteHistorico in storage.
     * POST /parteHistoricos
     *
     * @param CreateParteHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteHistoricoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::create($input);

        return $this->sendResponse($parteHistorico->toArray(), 'Parte Historico guardado exitosamente');
    }

    /**
     * Display the specified ParteHistorico.
     * GET|HEAD /parteHistoricos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            return $this->sendError('Parte Historico no encontrado');
        }

        return $this->sendResponse($parteHistorico->toArray(), 'Parte Historico retrieved successfully');
    }

    /**
     * Update the specified ParteHistorico in storage.
     * PUT/PATCH /parteHistoricos/{id}
     *
     * @param int $id
     * @param UpdateParteHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteHistoricoAPIRequest $request)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            return $this->sendError('Parte Historico no encontrado');
        }

        $parteHistorico->fill($request->all());
        $parteHistorico->save();

        return $this->sendResponse($parteHistorico->toArray(), 'ParteHistorico actualizado con éxito');
    }

    /**
     * Remove the specified ParteHistorico from storage.
     * DELETE /parteHistoricos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteHistorico $parteHistorico */
        $parteHistorico = ParteHistorico::find($id);

        if (empty($parteHistorico)) {
            return $this->sendError('Parte Historico no encontrado');
        }

        $parteHistorico->delete();

        return $this->sendSuccess('Parte Historico deleted successfully');
    }
}
