<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteExamenAPIRequest;
use App\Http\Requests\API\UpdateParteExamenAPIRequest;
use App\Models\ParteExamen;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteExamenController
 * @package App\Http\Controllers\API
 */

class ParteExamenAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteExamen.
     * GET|HEAD /parteExamens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteExamen::with(['examen']);

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parte_id){
            $query->where('parte_id',$request->parte_id);
        }

        $parteExamens = $query->get();

        return $this->sendResponse($parteExamens->toArray(), 'Parte Examens retrieved successfully');
    }

    /**
     * Store a newly created ParteExamen in storage.
     * POST /parteExamens
     *
     * @param CreateParteExamenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteExamenAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::create($input);

        return $this->sendResponse($parteExamen->toArray(), 'Parte Examen guardado exitosamente');
    }

    /**
     * Display the specified ParteExamen.
     * GET|HEAD /parteExamens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            return $this->sendError('Parte Examen no encontrado');
        }

        return $this->sendResponse($parteExamen->toArray(), 'Parte Examen retrieved successfully');
    }

    /**
     * Update the specified ParteExamen in storage.
     * PUT/PATCH /parteExamens/{id}
     *
     * @param int $id
     * @param UpdateParteExamenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteExamenAPIRequest $request)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            return $this->sendError('Parte Examen no encontrado');
        }

        $parteExamen->fill($request->all());
        $parteExamen->save();

        return $this->sendResponse($parteExamen->toArray(), 'ParteExamen actualizado con éxito');
    }

    /**
     * Remove the specified ParteExamen from storage.
     * DELETE /parteExamens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            return $this->sendError('Parte Examen no encontrado');
        }

        $parteExamen->delete();

        return $this->sendSuccess('Parte Examen deleted successfully');
    }
}
