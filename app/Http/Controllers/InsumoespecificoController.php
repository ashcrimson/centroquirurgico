<?php

namespace App\Http\Controllers;

use App\DataTables\InsumoespecificoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInsumoespecificoRequest;
use App\Http\Requests\UpdateInsumoespecificoRequest;
use App\Models\Insumoespecifico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InsumoespecificoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Insumoespecificos')->only(['show']);
        $this->middleware('permission:Crear Insumoespecificos')->only(['create','store']);
        $this->middleware('permission:Editar Insumoespecificos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Insumoespecificos')->only(['destroy']);
    }

    /**
     * Display a listing of the Insumoespecifico.
     *
     * @param InsumoespecificoDataTable $insumoespecificoDataTable
     * @return Response
     */
    public function index(InsumoespecificoDataTable $insumoespecificoDataTable)
    {
        return $insumoespecificoDataTable->render('insumoespecificos.index');
    }

    /**
     * Show the form for creating a new Insumoespecifico.
     *
     * @return Response
     */
    public function create()
    {
        return view('insumoespecificos.create');
    }

    /**
     * Store a newly created Insumoespecifico in storage.
     *
     * @param CreateInsumoespecificoRequest $request
     *
     * @return Response
     */
    public function store(CreateInsumoespecificoRequest $request)
    {
        $input = $request->all();

        /** @var Insumoespecifico $insumoespecifico */
        $insumoespecifico = Insumoespecifico::create($input);

        Flash::success('Insumoespecifico guardado exitosamente.');

        return redirect(route('insumoespecificos.index'));
    }

    /**
     * Display the specified Insumoespecifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Insumoespecifico $insumoespecifico */
        $insumoespecifico = Insumoespecifico::find($id);

        if (empty($insumoespecifico)) {
            Flash::error('Insumoespecifico no encontrado');

            return redirect(route('insumoespecificos.index'));
        }

        return view('insumoespecificos.show')->with('insumoespecifico', $insumoespecifico);
    }

    /**
     * Show the form for editing the specified Insumoespecifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Insumoespecifico $insumoespecifico */
        $insumoespecifico = Insumoespecifico::find($id);

        if (empty($insumoespecifico)) {
            Flash::error('Insumoespecifico no encontrado');

            return redirect(route('insumoespecificos.index'));
        }

        return view('insumoespecificos.edit')->with('insumoespecifico', $insumoespecifico);
    }

    /**
     * Update the specified Insumoespecifico in storage.
     *
     * @param  int              $id
     * @param UpdateInsumoespecificoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInsumoespecificoRequest $request)
    {
        /** @var Insumoespecifico $insumoespecifico */
        $insumoespecifico = Insumoespecifico::find($id);

        if (empty($insumoespecifico)) {
            Flash::error('Insumoespecifico no encontrado');

            return redirect(route('insumoespecificos.index'));
        }

        $insumoespecifico->fill($request->all());
        $insumoespecifico->save();

        Flash::success('Insumoespecifico actualizado con éxito.');

        return redirect(route('insumoespecificos.index'));
    }

    /**
     * Remove the specified Insumoespecifico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Insumoespecifico $insumoespecifico */
        $insumoespecifico = Insumoespecifico::find($id);

        if (empty($insumoespecifico)) {
            Flash::error('Insumoespecifico no encontrado');

            return redirect(route('insumoespecificos.index'));
        }

        $insumoespecifico->delete();

        Flash::success('Insumoespecifico deleted successfully.');

        return redirect(route('insumoespecificos.index'));
    }
}
