<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEspecialidadAPIRequest;
use App\Http\Requests\API\UpdateEspecialidadAPIRequest;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EspecialidadController
 * @package App\Http\Controllers\API
 */

class EspecialidadAPIController extends AppBaseController
{
    /**
     * Display a listing of the Especialidad.
     * GET|HEAD /especialidades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Especialidad::query();

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
     * Store a newly created Especialidad in storage.
     * POST /especialidades
     *
     * @param CreateEspecialidadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::create($input);

        return $this->sendResponse($especialidad->toArray(), 'Especialidad guardado exitosamente');
    }

    /**
     * Display the specified Especialidad.
     * GET|HEAD /especialidades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            return $this->sendError('Especialidad no encontrado');
        }

        return $this->sendResponse($especialidad->toArray(), 'Especialidad retrieved successfully');
    }

    /**
     * Update the specified Especialidad in storage.
     * PUT/PATCH /especialidades/{id}
     *
     * @param int $id
     * @param UpdateEspecialidadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadAPIRequest $request)
    {
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            return $this->sendError('Especialidad no encontrado');
        }

        $especialidad->fill($request->all());
        $especialidad->save();

        return $this->sendResponse($especialidad->toArray(), 'Especialidad actualizado con éxito');
    }

    /**
     * Remove the specified Especialidad from storage.
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
        /** @var Especialidad $especialidad */
        $especialidad = Especialidad::find($id);

        if (empty($especialidad)) {
            return $this->sendError('Especialidad no encontrado');
        }

        $especialidad->delete();

        return $this->sendSuccess('Especialidad deleted successfully');
    }
}
