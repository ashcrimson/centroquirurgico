<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIntervencionesNewAPIRequest;
use App\Http\Requests\API\UpdateIntervencionesNewAPIRequest;
use App\Models\IntervencionesNew;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IntervencionesNewController
 * @package App\Http\Controllers\API
 */

class IntervencionesNewAPIController extends AppBaseController
{
    /**
     * Display a listing of the IntervencionesNew.
     * GET|HEAD /intervencionesNews
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = IntervencionesNew::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $intervencionesNews = $query->get();

        return $this->sendResponse($intervencionesNews->toArray(), 'Intervenciones News retrieved successfully');
    }

    /**
     * Store a newly created IntervencionesNew in storage.
     * POST /intervencionesNews
     *
     * @param CreateIntervencionesNewAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervencionesNewAPIRequest $request)
    {
        $input = $request->all();

        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::create($input);

        return $this->sendResponse($intervencionesNew->toArray(), 'Intervenciones New guardado exitosamente');
    }

    /**
     * Display the specified IntervencionesNew.
     * GET|HEAD /intervencionesNews/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            return $this->sendError('Intervenciones New no encontrado');
        }

        return $this->sendResponse($intervencionesNew->toArray(), 'Intervenciones New retrieved successfully');
    }

    /**
     * Update the specified IntervencionesNew in storage.
     * PUT/PATCH /intervencionesNews/{id}
     *
     * @param int $id
     * @param UpdateIntervencionesNewAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervencionesNewAPIRequest $request)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            return $this->sendError('Intervenciones New no encontrado');
        }

        $intervencionesNew->fill($request->all());
        $intervencionesNew->save();

        return $this->sendResponse($intervencionesNew->toArray(), 'IntervencionesNew actualizado con éxito');
    }

    /**
     * Remove the specified IntervencionesNew from storage.
     * DELETE /intervencionesNews/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            return $this->sendError('Intervenciones New no encontrado');
        }

        $intervencionesNew->delete();

        return $this->sendSuccess('Intervenciones New deleted successfully');
    }
}
