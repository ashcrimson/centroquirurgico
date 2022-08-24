<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParteIntervencionAPIRequest;
use App\Http\Requests\API\UpdateParteIntervencionAPIRequest;
use App\Models\ParteIntervencion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParteIntervencionController
 * @package App\Http\Controllers\API
 */

class ParteIntervencionAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParteIntervencion.
     * GET|HEAD /parteIntervenciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParteIntervencion::with(['intervencion']);

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parte_id){
            $query->where('parte_id',$request->parte_id)->with(['intervencionNew']);
        }

        $parteIntervenciones = $query->get();

        return $this->sendResponse($parteIntervenciones->toArray(), 'Parte Intervenciones recuperada con éxito');
    }

    /**
     * Store a newly created ParteIntervencion in storage.
     * POST /parteIntervenciones
     *
     * @param CreateParteIntervencionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParteIntervencionAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::create($input);

        return $this->sendResponse($parteIntervencion->toArray(), 'Intervencion guardada exitosamente');
    }

    /**
     * Display the specified ParteIntervencion.
     * GET|HEAD /parteIntervenciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            return $this->sendError('Parte Intervencion no encontrado');
        }

        return $this->sendResponse($parteIntervencion->toArray(), 'Intervencion recuperada con éxito');
    }

    /**
     * Update the specified ParteIntervencion in storage.
     * PUT/PATCH /parteIntervenciones/{id}
     *
     * @param int $id
     * @param UpdateParteIntervencionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteIntervencionAPIRequest $request)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            return $this->sendError('Parte Intervencion no encontrado');
        }

        $parteIntervencion->fill($request->all());
        $parteIntervencion->save();

        return $this->sendResponse($parteIntervencion->toArray(), 'Intervencion actualizada con éxito');
    }

    /**
     * Remove the specified ParteIntervencion from storage.
     * DELETE /parteIntervenciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteIntervencion $parteIntervencion */
        $parteIntervencion = ParteIntervencion::find($id);

        if (empty($parteIntervencion)) {
            return $this->sendError('Intervencion no encontrado');
        }

        $parteIntervencion->delete();

        return $this->sendSuccess('Intervencion eliminada con éxito');
    }
}
