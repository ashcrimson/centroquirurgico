<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBitacoraAPIRequest;
use App\Http\Requests\API\UpdateBitacoraAPIRequest;
use App\Models\Bitacora;
use App\Models\Parte;
use App\Models\ParteEstado;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class BitacoraController
 * @package App\Http\Controllers\API
 */

class BitacoraAPIController extends AppBaseController
{
    /**
     * Display a listing of the Bitacora.
     * GET|HEAD /bitacoras
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Bitacora::with(['user']);

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->parte_id){
            $query->where('parte_id',$request->parte_id);
        }
        $bitacoras = $query->orderBy('created_at','desc')->get();

        return $this->sendResponse($bitacoras->toArray(), 'Bitacoras retrieved successfully');
    }

    /**
     * Store a newly created Bitacora in storage.
     * POST /bitacoras
     *
     * @param CreateBitacoraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBitacoraAPIRequest $request)
    {


        try {
            DB::beginTransaction();


            $titulo = "";

            if ($request->estado_id){
                /**
                 * @var Parte $parte
                 */
                $parte = Parte::find($request->parte_id);
                $parte->estado_id = $request->estado_id;
                $parte->save();

                /**
                 * @var ParteEstado $estado
                 */
                $estado = ParteEstado::find($parte->estado_id);

                if ($estado->id == ParteEstado::PROGRAMADO){
//                    $titulo = "Cambio condición a: ". $estado->nombre.", Con fecha: ".fechaLtn($request->fecha);
                    $titulo = "Cambio condición a: ". $estado->nombre;

                }else{
                    $titulo = "Cambio condición a: ". $estado->nombre;

                }

            }

            $request->merge([
                'titulo' => $titulo
            ]);

            /** @var Bitacora $bitacora */
            $bitacora = Bitacora::create($request->all());


        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        return $this->sendResponse($bitacora->toArray(), 'Bitacora guardado exitosamente');
    }

    /**
     * Display the specified Bitacora.
     * GET|HEAD /bitacoras/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bitacora $bitacora */
        $bitacora = Bitacora::find($id);

        if (empty($bitacora)) {
            return $this->sendError('Bitacora no encontrado');
        }

        return $this->sendResponse($bitacora->toArray(), 'Bitacora retrieved successfully');
    }

    /**
     * Update the specified Bitacora in storage.
     * PUT/PATCH /bitacoras/{id}
     *
     * @param int $id
     * @param UpdateBitacoraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBitacoraAPIRequest $request)
    {
        /** @var Bitacora $bitacora */
        $bitacora = Bitacora::find($id);

        if (empty($bitacora)) {
            return $this->sendError('Bitacora no encontrado');
        }

        $bitacora->fill($request->all());
        $bitacora->save();

        return $this->sendResponse($bitacora->toArray(), 'Bitacora actualizado con éxito');
    }

    /**
     * Remove the specified Bitacora from storage.
     * DELETE /bitacoras/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bitacora $bitacora */
        $bitacora = Bitacora::find($id);

        if (empty($bitacora)) {
            return $this->sendError('Bitacora no encontrado');
        }

        $bitacora->delete();

        return $this->sendSuccess('Bitacora deleted successfully');
    }
}
