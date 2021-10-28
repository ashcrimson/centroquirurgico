<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteDiagnosticoAPIRequest;
use App\Http\Requests\API\UpdateParteDiagnosticoAPIRequest;
use App\Models\ParteDiagnostico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteDiagnosticoController
 * @package App\Http\Controllers\API
 */

class ParteDiagnosticoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteDiagnostico.
     * GET|HEAD /parteDiagnosticos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteDiagnostico::with(['diagnostico']);

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parte_id){
            $query->where('parte_id',$request->parte_id);
        }


        $parteDiagnosticos = $query->get();

        return $this->sendResponse($parteDiagnosticos->toArray(), 'Parte Diagnosticos retrieved successfully');
    }

    /**
     * Store a newly created ParteDiagnostico in storage.
     * POST /parteDiagnosticos
     *
     * @param CreateParteDiagnosticoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteDiagnosticoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::create($input);

        return $this->sendResponse($parteDiagnostico->toArray(), 'Parte Diagnostico guardado exitosamente');
    }

    /**
     * Display the specified ParteDiagnostico.
     * GET|HEAD /parteDiagnosticos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            return $this->sendError('Parte Diagnostico no encontrado');
        }

        return $this->sendResponse($parteDiagnostico->toArray(), 'Parte Diagnostico retrieved successfully');
    }

    /**
     * Update the specified ParteDiagnostico in storage.
     * PUT/PATCH /parteDiagnosticos/{id}
     *
     * @param int $id
     * @param UpdateParteDiagnosticoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteDiagnosticoAPIRequest $request)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            return $this->sendError('Parte Diagnostico no encontrado');
        }

        $parteDiagnostico->fill($request->all());
        $parteDiagnostico->save();

        return $this->sendResponse($parteDiagnostico->toArray(), 'ParteDiagnostico actualizado con éxito');
    }

    /**
     * Remove the specified ParteDiagnostico from storage.
     * DELETE /parteDiagnosticos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteDiagnostico $parteDiagnostico */
        $parteDiagnostico = ParteDiagnostico::find($id);

        if (empty($parteDiagnostico)) {
            return $this->sendError('Parte Diagnostico no encontrado');
        }

        $parteDiagnostico->delete();

        return $this->sendSuccess('Parte Diagnostico deleted successfully');
    }
}
