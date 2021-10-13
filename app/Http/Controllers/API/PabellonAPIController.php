<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePabellonAPIRequest;
use App\Http\Requests\API\UpdatePabellonAPIRequest;
use App\Models\Pabellon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PabellonController
 * @package App\Http\Controllers\API
 */

class PabellonAPIController extends AppBaseController
{
    /**
     * Display a listing of the Pabellon.
     * GET|HEAD /pabellones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Pabellon::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $pabellones = $query->get();

        return $this->sendResponse($pabellones->toArray(), 'pabellones retrieved successfully');
    }

    /**
     * Store a newly created Pabellon in storage.
     * POST /pabellones
     *
     * @param CreatePabellonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePabellonAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::create($input);

        return $this->sendResponse($pabellon->toArray(), 'Pabellon guardado exitosamente');
    }

    /**
     * Display the specified Pabellon.
     * GET|HEAD /pabellones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            return $this->sendError('Pabellon no encontrado');
        }

        return $this->sendResponse($pabellon->toArray(), 'Pabellon retrieved successfully');
    }

    /**
     * Update the specified Pabellon in storage.
     * PUT/PATCH /pabellones/{id}
     *
     * @param int $id
     * @param UpdatePabellonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePabellonAPIRequest $request)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            return $this->sendError('Pabellon no encontrado');
        }

        $pabellon->fill($request->all());
        $pabellon->save();

        return $this->sendResponse($pabellon->toArray(), 'Pabellon actualizado con éxito');
    }

    /**
     * Remove the specified Pabellon from storage.
     * DELETE /pabellones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            return $this->sendError('Pabellon no encontrado');
        }

        $pabellon->delete();

        return $this->sendSuccess('Pabellon deleted successfully');
    }
}
