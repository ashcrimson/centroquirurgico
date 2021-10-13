<?php

namespace App\Http\Controllers;

use App\DataTables\PabellonDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePabellonRequest;
use App\Http\Requests\UpdatePabellonRequest;
use App\Models\Pabellon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PabellonController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Pabellons')->only(['show']);
        $this->middleware('permission:Crear Pabellons')->only(['create','store']);
        $this->middleware('permission:Editar Pabellons')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Pabellons')->only(['destroy']);
    }

    /**
     * Display a listing of the Pabellon.
     *
     * @param PabellonDataTable $pabellonDataTable
     * @return Response
     */
    public function index(PabellonDataTable $pabellonDataTable)
    {
        return $pabellonDataTable->render('pabellons.index');
    }

    /**
     * Show the form for creating a new Pabellon.
     *
     * @return Response
     */
    public function create()
    {
        return view('pabellons.create');
    }

    /**
     * Store a newly created Pabellon in storage.
     *
     * @param CreatePabellonRequest $request
     *
     * @return Response
     */
    public function store(CreatePabellonRequest $request)
    {
        $input = $request->all();

        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::create($input);

        Flash::success('Pabellon guardado exitosamente.');

        return redirect(route('pabellons.index'));
    }

    /**
     * Display the specified Pabellon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            Flash::error('Pabellon no encontrado');

            return redirect(route('pabellons.index'));
        }

        return view('pabellons.show')->with('pabellon', $pabellon);
    }

    /**
     * Show the form for editing the specified Pabellon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            Flash::error('Pabellon no encontrado');

            return redirect(route('pabellons.index'));
        }

        return view('pabellons.edit')->with('pabellon', $pabellon);
    }

    /**
     * Update the specified Pabellon in storage.
     *
     * @param  int              $id
     * @param UpdatePabellonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePabellonRequest $request)
    {
        /** @var Pabellon $pabellon */
        $pabellon = Pabellon::find($id);

        if (empty($pabellon)) {
            Flash::error('Pabellon no encontrado');

            return redirect(route('pabellons.index'));
        }

        $pabellon->fill($request->all());
        $pabellon->save();

        Flash::success('Pabellon actualizado con éxito.');

        return redirect(route('pabellons.index'));
    }

    /**
     * Remove the specified Pabellon from storage.
     *
     * @param  int $id
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
            Flash::error('Pabellon no encontrado');

            return redirect(route('pabellons.index'));
        }

        $pabellon->delete();

        Flash::success('Pabellon deleted successfully.');

        return redirect(route('pabellons.index'));
    }
}
