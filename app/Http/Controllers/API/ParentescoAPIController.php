<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParentescoAPIRequest;
use App\Http\Requests\API\UpdateParentescoAPIRequest;
use App\Models\Parentesco;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParentescoController
 * @package App\Http\Controllers\API
 */

class ParentescoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Parentesco.
     * GET|HEAD /parentescos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Parentesco::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $parentescos = $query->get();

        return $this->sendResponse($parentescos->toArray(), 'Parentescos retrieved successfully');
    }

    /**
     * Store a newly created Parentesco in storage.
     * POST /parentescos
     *
     * @param CreateParentescoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParentescoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::create($input);

        return $this->sendResponse($parentesco->toArray(), 'Parentesco guardado exitosamente');
    }

    /**
     * Display the specified Parentesco.
     * GET|HEAD /parentescos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            return $this->sendError('Parentesco no encontrado');
        }

        return $this->sendResponse($parentesco->toArray(), 'Parentesco retrieved successfully');
    }

    /**
     * Update the specified Parentesco in storage.
     * PUT/PATCH /parentescos/{id}
     *
     * @param int $id
     * @param UpdateParentescoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParentescoAPIRequest $request)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            return $this->sendError('Parentesco no encontrado');
        }

        $parentesco->fill($request->all());
        $parentesco->save();

        return $this->sendResponse($parentesco->toArray(), 'Parentesco actualizado con éxito');
    }

    /**
     * Remove the specified Parentesco from storage.
     * DELETE /parentescos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            return $this->sendError('Parentesco no encontrado');
        }

        $parentesco->delete();

        return $this->sendSuccess('Parentesco deleted successfully');
    }
}
