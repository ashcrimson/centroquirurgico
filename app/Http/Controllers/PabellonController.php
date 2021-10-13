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
        $this->middleware('permission:Ver pabellones')->only(['show']);
        $this->middleware('permission:Crear pabellones')->only(['create','store']);
        $this->middleware('permission:Editar pabellones')->only(['edit','update',]);
        $this->middleware('permission:Eliminar pabellones')->only(['destroy']);
    }

    /**
     * Display a listing of the Pabellon.
     *
     * @param PabellonDataTable $pabellonDataTable
     * @return Response
     */
    public function index(PabellonDataTable $pabellonDataTable)
    {
        return $pabellonDataTable->render('pabellones.index');
    }

    /**
     * Show the form for creating a new Pabellon.
     *
     * @return Response
     */
    public function create()
    {
        return view('pabellones.create');
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

        return redirect(route('pabellones.index'));
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

            return redirect(route('pabellones.index'));
        }

        return view('pabellones.show')->with('pabellon', $pabellon);
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

            return redirect(route('pabellones.index'));
        }

        return view('pabellones.edit')->with('pabellon', $pabellon);
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

            return redirect(route('pabellones.index'));
        }

        $pabellon->fill($request->all());
        $pabellon->save();

        Flash::success('Pabellon actualizado con éxito.');

        return redirect(route('pabellones.index'));
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

            return redirect(route('pabellones.index'));
        }

        $pabellon->delete();

        Flash::success('Pabellon deleted successfully.');

        return redirect(route('pabellones.index'));
    }
}
