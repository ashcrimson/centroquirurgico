<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExamenAPIRequest;
use App\Http\Requests\API\UpdateExamenAPIRequest;
use App\Models\Examen;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExamenController
 * @package App\Http\Controllers\API
 */

class ExamenAPIController extends AppBaseController
{
    /**
     * Display a listing of the Examen.
     * GET|HEAD /examens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Examen::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $examens = $query->get();

        return $this->sendResponse($examens->toArray(), 'Examens retrieved successfully');
    }

    /**
     * Store a newly created Examen in storage.
     * POST /examens
     *
     * @param CreateExamenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExamenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Examen $examen */
        $examen = Examen::create($input);

        return $this->sendResponse($examen->toArray(), 'Examen guardado exitosamente');
    }

    /**
     * Display the specified Examen.
     * GET|HEAD /examens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            return $this->sendError('Examen no encontrado');
        }

        return $this->sendResponse($examen->toArray(), 'Examen retrieved successfully');
    }

    /**
     * Update the specified Examen in storage.
     * PUT/PATCH /examens/{id}
     *
     * @param int $id
     * @param UpdateExamenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamenAPIRequest $request)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            return $this->sendError('Examen no encontrado');
        }

        $examen->fill($request->all());
        $examen->save();

        return $this->sendResponse($examen->toArray(), 'Examen actualizado con éxito');
    }

    /**
     * Remove the specified Examen from storage.
     * DELETE /examens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            return $this->sendError('Examen no encontrado');
        }

        $examen->delete();

        return $this->sendSuccess('Examen deleted successfully');
    }
}
