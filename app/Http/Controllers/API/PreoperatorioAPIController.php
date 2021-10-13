<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePreoperatorioAPIRequest;
use App\Http\Requests\API\UpdatePreoperatorioAPIRequest;
use App\Models\Preoperatorio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PreoperatorioController
 * @package App\Http\Controllers\API
 */

class PreoperatorioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Preoperatorio.
     * GET|HEAD /preoperatorios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Preoperatorio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $preoperatorios = $query->get();

        return $this->sendResponse($preoperatorios->toArray(), 'Preoperatorios retrieved successfully');
    }

    /**
     * Store a newly created Preoperatorio in storage.
     * POST /preoperatorios
     *
     * @param CreatePreoperatorioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePreoperatorioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::create($input);

        return $this->sendResponse($preoperatorio->toArray(), 'Preoperatorio guardado exitosamente');
    }

    /**
     * Display the specified Preoperatorio.
     * GET|HEAD /preoperatorios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            return $this->sendError('Preoperatorio no encontrado');
        }

        return $this->sendResponse($preoperatorio->toArray(), 'Preoperatorio retrieved successfully');
    }

    /**
     * Update the specified Preoperatorio in storage.
     * PUT/PATCH /preoperatorios/{id}
     *
     * @param int $id
     * @param UpdatePreoperatorioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreoperatorioAPIRequest $request)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            return $this->sendError('Preoperatorio no encontrado');
        }

        $preoperatorio->fill($request->all());
        $preoperatorio->save();

        return $this->sendResponse($preoperatorio->toArray(), 'Preoperatorio actualizado con éxito');
    }

    /**
     * Remove the specified Preoperatorio from storage.
     * DELETE /preoperatorios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Preoperatorio $preoperatorio */
        $preoperatorio = Preoperatorio::find($id);

        if (empty($preoperatorio)) {
            return $this->sendError('Preoperatorio no encontrado');
        }

        $preoperatorio->delete();

        return $this->sendSuccess('Preoperatorio deleted successfully');
    }
}
