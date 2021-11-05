<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteMedicamentoAPIRequest;
use App\Http\Requests\API\UpdateParteMedicamentoAPIRequest;
use App\Models\ParteMedicamento;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteMedicamentoController
 * @package App\Http\Controllers\API
 */

class ParteMedicamentoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteMedicamento.
     * GET|HEAD /parteMedicamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteMedicamento::with(['medicamento']);

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parte_id){
            $query->where('parte_id',$request->parte_id);
        }


        $parteMedicamentos = $query->get();

        return $this->sendResponse($parteMedicamentos->toArray(), 'Parte Medicamentos retrieved successfully');
    }

    /**
     * Store a newly created ParteMedicamento in storage.
     * POST /parteMedicamentos
     *
     * @param CreateParteMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteMedicamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteMedicamento $parteMedicamento */
        $parteMedicamento = ParteMedicamento::create($input);

        return $this->sendResponse($parteMedicamento->toArray(), 'Parte Medicamento guardado exitosamente');
    }

    /**
     * Display the specified ParteMedicamento.
     * GET|HEAD /parteMedicamentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteMedicamento $parteMedicamento */
        $parteMedicamento = ParteMedicamento::find($id);

        if (empty($parteMedicamento)) {
            return $this->sendError('Parte Medicamento no encontrado');
        }

        return $this->sendResponse($parteMedicamento->toArray(), 'Parte Medicamento retrieved successfully');
    }

    /**
     * Update the specified ParteMedicamento in storage.
     * PUT/PATCH /parteMedicamentos/{id}
     *
     * @param int $id
     * @param UpdateParteMedicamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteMedicamentoAPIRequest $request)
    {
        /** @var ParteMedicamento $parteMedicamento */
        $parteMedicamento = ParteMedicamento::find($id);

        if (empty($parteMedicamento)) {
            return $this->sendError('Parte Medicamento no encontrado');
        }

        $parteMedicamento->fill($request->all());
        $parteMedicamento->save();

        return $this->sendResponse($parteMedicamento->toArray(), 'ParteMedicamento actualizado con éxito');
    }

    /**
     * Remove the specified ParteMedicamento from storage.
     * DELETE /parteMedicamentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteMedicamento $parteMedicamento */
        $parteMedicamento = ParteMedicamento::find($id);

        if (empty($parteMedicamento)) {
            return $this->sendError('Parte Medicamento no encontrado');
        }

        $parteMedicamento->delete();

        return $this->sendSuccess('Parte Medicamento deleted successfully');
    }
}
