<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCirugiaTipoAPIRequest;
use App\Http\Requests\API\UpdateCirugiaTipoAPIRequest;
use App\Models\CirugiaTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CirugiaTipoController
 * @package App\Http\Controllers\API
 */

class CirugiaTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the CirugiaTipo.
     * GET|HEAD /cirugiaTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = CirugiaTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $cirugiaTipos = $query->get();

        return $this->sendResponse($cirugiaTipos->toArray(), 'Cirugia Tipos retrieved successfully');
    }

    /**
     * Store a newly created CirugiaTipo in storage.
     * POST /cirugiaTipos
     *
     * @param CreateCirugiaTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCirugiaTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::create($input);

        return $this->sendResponse($cirugiaTipo->toArray(), 'Cirugia Tipo guardado exitosamente');
    }

    /**
     * Display the specified CirugiaTipo.
     * GET|HEAD /cirugiaTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            return $this->sendError('Cirugia Tipo no encontrado');
        }

        return $this->sendResponse($cirugiaTipo->toArray(), 'Cirugia Tipo retrieved successfully');
    }

    /**
     * Update the specified CirugiaTipo in storage.
     * PUT/PATCH /cirugiaTipos/{id}
     *
     * @param int $id
     * @param UpdateCirugiaTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCirugiaTipoAPIRequest $request)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            return $this->sendError('Cirugia Tipo no encontrado');
        }

        $cirugiaTipo->fill($request->all());
        $cirugiaTipo->save();

        return $this->sendResponse($cirugiaTipo->toArray(), 'CirugiaTipo actualizado con éxito');
    }

    /**
     * Remove the specified CirugiaTipo from storage.
     * DELETE /cirugiaTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CirugiaTipo $cirugiaTipo */
        $cirugiaTipo = CirugiaTipo::find($id);

        if (empty($cirugiaTipo)) {
            return $this->sendError('Cirugia Tipo no encontrado');
        }

        $cirugiaTipo->delete();

        return $this->sendSuccess('Cirugia Tipo deleted successfully');
    }
}
