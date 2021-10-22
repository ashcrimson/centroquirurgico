<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSistemaSaludAPIRequest;
use App\Http\Requests\API\UpdateSistemaSaludAPIRequest;
use App\Models\SistemaSalud;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SistemaSaludController
 * @package App\Http\Controllers\API
 */

class SistemaSaludAPIController extends AppBaseController
{
    /**
     * Display a listing of the SistemaSalud.
     * GET|HEAD /sistemaSalud
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SistemaSalud::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $sistemaSalud = $query->get();

        return $this->sendResponse($sistemaSalud->toArray(), 'Sistema Saluds retrieved successfully');
    }

    /**
     * Store a newly created SistemaSalud in storage.
     * POST /sistemaSalud
     *
     * @param CreateSistemaSaludAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSistemaSaludAPIRequest $request)
    {
        $input = $request->all();

        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::create($input);

        return $this->sendResponse($sistemaSalud->toArray(), 'Sistema Salud guardado exitosamente');
    }

    /**
     * Display the specified SistemaSalud.
     * GET|HEAD /sistemaSalud/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            return $this->sendError('Sistema Salud no encontrado');
        }

        return $this->sendResponse($sistemaSalud->toArray(), 'Sistema Salud retrieved successfully');
    }

    /**
     * Update the specified SistemaSalud in storage.
     * PUT/PATCH /sistemaSalud/{id}
     *
     * @param int $id
     * @param UpdateSistemaSaludAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSistemaSaludAPIRequest $request)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            return $this->sendError('Sistema Salud no encontrado');
        }

        $sistemaSalud->fill($request->all());
        $sistemaSalud->save();

        return $this->sendResponse($sistemaSalud->toArray(), 'SistemaSalud actualizado con éxito');
    }

    /**
     * Remove the specified SistemaSalud from storage.
     * DELETE /sistemaSalud/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SistemaSalud $sistemaSalud */
        $sistemaSalud = SistemaSalud::find($id);

        if (empty($sistemaSalud)) {
            return $this->sendError('Sistema Salud no encontrado');
        }

        $sistemaSalud->delete();

        return $this->sendSuccess('Sistema Salud deleted successfully');
    }
}
