<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEspecialidadSubAPIRequest;
use App\Http\Requests\API\UpdateEspecialidadSubAPIRequest;
use App\Models\EspecialidadSub;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EspecialidadSubController
 * @package App\Http\Controllers\API
 */

class EspecialidadSubAPIController extends AppBaseController
{
    /**
     * Display a listing of the EspecialidadSub.
     * GET|HEAD /especialidadSubs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = EspecialidadSub::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $especialidadSubs = $query->get();

        return $this->sendResponse($especialidadSubs->toArray(), 'Especialidad Subs retrieved successfully');
    }

    /**
     * Store a newly created EspecialidadSub in storage.
     * POST /especialidadSubs
     *
     * @param CreateEspecialidadSubAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEspecialidadSubAPIRequest $request)
    {
        $input = $request->all();

        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::create($input);

        return $this->sendResponse($especialidadSub->toArray(), 'Especialidad Sub guardado exitosamente');
    }

    /**
     * Display the specified EspecialidadSub.
     * GET|HEAD /especialidadSubs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            return $this->sendError('Especialidad Sub no encontrado');
        }

        return $this->sendResponse($especialidadSub->toArray(), 'Especialidad Sub retrieved successfully');
    }

    /**
     * Update the specified EspecialidadSub in storage.
     * PUT/PATCH /especialidadSubs/{id}
     *
     * @param int $id
     * @param UpdateEspecialidadSubAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspecialidadSubAPIRequest $request)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            return $this->sendError('Especialidad Sub no encontrado');
        }

        $especialidadSub->fill($request->all());
        $especialidadSub->save();

        return $this->sendResponse($especialidadSub->toArray(), 'EspecialidadSub actualizado con éxito');
    }

    /**
     * Remove the specified EspecialidadSub from storage.
     * DELETE /especialidadSubs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EspecialidadSub $especialidadSub */
        $especialidadSub = EspecialidadSub::find($id);

        if (empty($especialidadSub)) {
            return $this->sendError('Especialidad Sub no encontrado');
        }

        $especialidadSub->delete();

        return $this->sendSuccess('Especialidad Sub deleted successfully');
    }
}
