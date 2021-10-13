<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClasificacionAPIRequest;
use App\Http\Requests\API\UpdateClasificacionAPIRequest;
use App\Models\Clasificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClasificacionController
 * @package App\Http\Controllers\API
 */

class ClasificacionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Clasificacion.
     * GET|HEAD /clasificacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Clasificacion::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $clasificacions = $query->get();

        return $this->sendResponse($clasificacions->toArray(), 'Clasificacions retrieved successfully');
    }

    /**
     * Store a newly created Clasificacion in storage.
     * POST /clasificacions
     *
     * @param CreateClasificacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClasificacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::create($input);

        return $this->sendResponse($clasificacion->toArray(), 'Clasificacion guardado exitosamente');
    }

    /**
     * Display the specified Clasificacion.
     * GET|HEAD /clasificacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            return $this->sendError('Clasificacion no encontrado');
        }

        return $this->sendResponse($clasificacion->toArray(), 'Clasificacion retrieved successfully');
    }

    /**
     * Update the specified Clasificacion in storage.
     * PUT/PATCH /clasificacions/{id}
     *
     * @param int $id
     * @param UpdateClasificacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClasificacionAPIRequest $request)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            return $this->sendError('Clasificacion no encontrado');
        }

        $clasificacion->fill($request->all());
        $clasificacion->save();

        return $this->sendResponse($clasificacion->toArray(), 'Clasificacion actualizado con éxito');
    }

    /**
     * Remove the specified Clasificacion from storage.
     * DELETE /clasificacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Clasificacion $clasificacion */
        $clasificacion = Clasificacion::find($id);

        if (empty($clasificacion)) {
            return $this->sendError('Clasificacion no encontrado');
        }

        $clasificacion->delete();

        return $this->sendSuccess('Clasificacion deleted successfully');
    }
}
