<?php

namespace App\Http\Controllers;

use App\DataTables\ParentescoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParentescoRequest;
use App\Http\Requests\UpdateParentescoRequest;
use App\Models\Parentesco;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParentescoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parentescos')->only(['show']);
        $this->middleware('permission:Crear Parentescos')->only(['create','store']);
        $this->middleware('permission:Editar Parentescos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parentescos')->only(['destroy']);
    }

    /**
     * Display a listing of the Parentesco.
     *
     * @param ParentescoDataTable $parentescoDataTable
     * @return Response
     */
    public function index(ParentescoDataTable $parentescoDataTable)
    {
        return $parentescoDataTable->render('parentescos.index');
    }

    /**
     * Show the form for creating a new Parentesco.
     *
     * @return Response
     */
    public function create()
    {
        return view('parentescos.create');
    }

    /**
     * Store a newly created Parentesco in storage.
     *
     * @param CreateParentescoRequest $request
     *
     * @return Response
     */
    public function store(CreateParentescoRequest $request)
    {
        $input = $request->all();

        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::create($input);

        Flash::success('Parentesco guardado exitosamente.');

        return redirect(route('parentescos.index'));
    }

    /**
     * Display the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            Flash::error('Parentesco no encontrado');

            return redirect(route('parentescos.index'));
        }

        return view('parentescos.show')->with('parentesco', $parentesco);
    }

    /**
     * Show the form for editing the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            Flash::error('Parentesco no encontrado');

            return redirect(route('parentescos.index'));
        }

        return view('parentescos.edit')->with('parentesco', $parentesco);
    }

    /**
     * Update the specified Parentesco in storage.
     *
     * @param  int              $id
     * @param UpdateParentescoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParentescoRequest $request)
    {
        /** @var Parentesco $parentesco */
        $parentesco = Parentesco::find($id);

        if (empty($parentesco)) {
            Flash::error('Parentesco no encontrado');

            return redirect(route('parentescos.index'));
        }

        $parentesco->fill($request->all());
        $parentesco->save();

        Flash::success('Parentesco actualizado con éxito.');

        return redirect(route('parentescos.index'));
    }

    /**
     * Remove the specified Parentesco from storage.
     *
     * @param  int $id
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
            Flash::error('Parentesco no encontrado');

            return redirect(route('parentescos.index'));
        }

        $parentesco->delete();

        Flash::success('Parentesco deleted successfully.');

        return redirect(route('parentescos.index'));
    }
}
