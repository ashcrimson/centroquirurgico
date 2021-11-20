<?php

namespace App\Http\Controllers;

use App\DataTables\ExamenDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateExamenRequest;
use App\Http\Requests\UpdateExamenRequest;
use App\Models\Examen;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ExamenController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Examens')->only(['show']);
        $this->middleware('permission:Crear Examens')->only(['create','store']);
        $this->middleware('permission:Editar Examens')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Examens')->only(['destroy']);
    }

    /**
     * Display a listing of the Examen.
     *
     * @param ExamenDataTable $examenDataTable
     * @return Response
     */
    public function index(ExamenDataTable $examenDataTable)
    {
        return $examenDataTable->render('examens.index');
    }

    /**
     * Show the form for creating a new Examen.
     *
     * @return Response
     */
    public function create()
    {
        return view('examens.create');
    }

    /**
     * Store a newly created Examen in storage.
     *
     * @param CreateExamenRequest $request
     *
     * @return Response
     */
    public function store(CreateExamenRequest $request)
    {
        $input = $request->all();

        /** @var Examen $examen */
        $examen = Examen::create($input);

        Flash::success('Examen guardado exitosamente.');

        return redirect(route('examens.index'));
    }

    /**
     * Display the specified Examen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            Flash::error('Examen no encontrado');

            return redirect(route('examens.index'));
        }

        return view('examens.show')->with('examen', $examen);
    }

    /**
     * Show the form for editing the specified Examen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            Flash::error('Examen no encontrado');

            return redirect(route('examens.index'));
        }

        return view('examens.edit')->with('examen', $examen);
    }

    /**
     * Update the specified Examen in storage.
     *
     * @param  int              $id
     * @param UpdateExamenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamenRequest $request)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            Flash::error('Examen no encontrado');

            return redirect(route('examens.index'));
        }

        $examen->fill($request->all());
        $examen->save();

        Flash::success('Examen actualizado con éxito.');

        return redirect(route('examens.index'));
    }

    /**
     * Remove the specified Examen from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Examen $examen */
        $examen = Examen::find($id);

        if (empty($examen)) {
            Flash::error('Examen no encontrado');

            return redirect(route('examens.index'));
        }

        $examen->delete();

        Flash::success('Examen deleted successfully.');

        return redirect(route('examens.index'));
    }
}
