<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEspecialidaAPIRequest;
use App\Http\Requests\API\UpdateEspecialidaAPIRequest;
use App\Models\Especialida;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EspecialidaController
 * @package App\Http\Controllers\API
 */

class EspecialidaAPIController extends AppBaseController
{
    /**
     * Display a listing of the Especialida.
     * GET|HEAD /especialidades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Especialida::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $especialidades = $query->get();

        return $this->sendResponse($especialidades->toArray(), 'especialidades retrieved successfully');
    }

    /**
     * Store a newly created Especialida in storage.
     * POST /especialidades
     *
     * @param CreateEspecialidaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Especialida $especialida */
        $especialida = Especialida::create($input);

        return $this->sendResponse($especialida->toArray(), 'Especialida guardado exitosamente');
    }

    /**
     * Display the specified Especialida.
     * GET|HEAD /especialidades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            return $this->sendError('Especialida no encontrado');
        }

        return $this->sendResponse($especialida->toArray(), 'Especialida retrieved successfully');
    }

    /**
     * Update the specified Especialida in storage.
     * PUT/PATCH /especialidades/{id}
     *
     * @param int $id
     * @param UpdateEspecialidaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidaAPIRequest $request)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            return $this->sendError('Especialida no encontrado');
        }

        $especialida->fill($request->all());
        $especialida->save();

        return $this->sendResponse($especialida->toArray(), 'Especialida actualizado con éxito');
    }

    /**
     * Remove the specified Especialida from storage.
     * DELETE /especialidades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Especialida $especialida */
        $especialida = Especialida::find($id);

        if (empty($especialida)) {
            return $this->sendError('Especialida no encontrado');
        }

        $especialida->delete();

        return $this->sendSuccess('Especialida deleted successfully');
    }
}
