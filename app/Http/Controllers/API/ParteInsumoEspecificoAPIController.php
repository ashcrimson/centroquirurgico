<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteInsumoEspecificoAPIRequest;
use App\Http\Requests\API\UpdateParteInsumoEspecificoAPIRequest;
use App\Models\ParteInsumoEspecifico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteInsumoEspecificoController
 * @package App\Http\Controllers\API
 */

class ParteInsumoEspecificoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteInsumoEspecifico.
     * GET|HEAD /parteInsumoEspecificos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteInsumoEspecifico::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->get('parte_id')) {
            $query->where('parte_id', $request->get('parte_id'))->with(['insumo']);
        }

        $parteInsumoEspecificos = $query->get();

        return $this->sendResponse($parteInsumoEspecificos->toArray(), 'Parte Insumo Especificos retrieved successfully');
    }

    /**
     * Store a newly created ParteInsumoEspecifico in storage.
     * POST /parteInsumoEspecificos
     *
     * @param CreateParteInsumoEspecificoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteInsumoEspecificoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteInsumoEspecifico $parteInsumoEspecifico */
        $parteInsumoEspecifico = ParteInsumoEspecifico::create($input);

        return $this->sendResponse($parteInsumoEspecifico->toArray(), 'Parte Insumo Especifico guardado exitosamente');
    }

    /**
     * Display the specified ParteInsumoEspecifico.
     * GET|HEAD /parteInsumoEspecificos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteInsumoEspecifico $parteInsumoEspecifico */
        $parteInsumoEspecifico = ParteInsumoEspecifico::find($id);

        if (empty($parteInsumoEspecifico)) {
            return $this->sendError('Parte Insumo Especifico no encontrado');
        }

        return $this->sendResponse($parteInsumoEspecifico->toArray(), 'Parte Insumo Especifico retrieved successfully');
    }

    /**
     * Update the specified ParteInsumoEspecifico in storage.
     * PUT/PATCH /parteInsumoEspecificos/{id}
     *
     * @param int $id
     * @param UpdateParteInsumoEspecificoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteInsumoEspecificoAPIRequest $request)
    {
        /** @var ParteInsumoEspecifico $parteInsumoEspecifico */
        $parteInsumoEspecifico = ParteInsumoEspecifico::find($id);

        if (empty($parteInsumoEspecifico)) {
            return $this->sendError('Parte Insumo Especifico no encontrado');
        }

        $parteInsumoEspecifico->fill($request->all());
        $parteInsumoEspecifico->save();

        return $this->sendResponse($parteInsumoEspecifico->toArray(), 'ParteInsumoEspecifico actualizado con éxito');
    }

    /**
     * Remove the specified ParteInsumoEspecifico from storage.
     * DELETE /parteInsumoEspecificos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteInsumoEspecifico $parteInsumoEspecifico */
        $parteInsumoEspecifico = ParteInsumoEspecifico::find($id);

        if (empty($parteInsumoEspecifico)) {
            return $this->sendError('Parte Insumo Especifico no encontrado');
        }

        $parteInsumoEspecifico->delete();

        return $this->sendSuccess('Parte Insumo Especifico deleted successfully');
    }
}
