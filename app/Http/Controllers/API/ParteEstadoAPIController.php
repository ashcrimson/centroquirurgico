<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteEstadoAPIRequest;
use App\Http\Requests\API\UpdateParteEstadoAPIRequest;
use App\Models\ParteEstado;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteEstadoController
 * @package App\Http\Controllers\API
 */

class ParteEstadoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteEstado.
     * GET|HEAD /parteEstados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteEstado::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $parteEstados = $query->get();

        return $this->sendResponse($parteEstados->toArray(), 'Parte Estados retrieved successfully');
    }

    /**
     * Store a newly created ParteEstado in storage.
     * POST /parteEstados
     *
     * @param CreateParteEstadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteEstadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::create($input);

        return $this->sendResponse($parteEstado->toArray(), 'Parte Estado guardado exitosamente');
    }

    /**
     * Display the specified ParteEstado.
     * GET|HEAD /parteEstados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            return $this->sendError('Parte Estado no encontrado');
        }

        return $this->sendResponse($parteEstado->toArray(), 'Parte Estado retrieved successfully');
    }

    /**
     * Update the specified ParteEstado in storage.
     * PUT/PATCH /parteEstados/{id}
     *
     * @param int $id
     * @param UpdateParteEstadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteEstadoAPIRequest $request)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            return $this->sendError('Parte Estado no encontrado');
        }

        $parteEstado->fill($request->all());
        $parteEstado->save();

        return $this->sendResponse($parteEstado->toArray(), 'ParteEstado actualizado con éxito');
    }

    /**
     * Remove the specified ParteEstado from storage.
     * DELETE /parteEstados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteEstado $parteEstado */
        $parteEstado = ParteEstado::find($id);

        if (empty($parteEstado)) {
            return $this->sendError('Parte Estado no encontrado');
        }

        $parteEstado->delete();

        return $this->sendSuccess('Parte Estado deleted successfully');
    }
}
