<?php

namespace App\Http\Controllers;

use App\DataTables\ParteExamenDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParteExamenRequest;
use App\Http\Requests\UpdateParteExamenRequest;
use App\Models\ParteExamen;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParteExamenController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Parte Examens')->only(['show']);
        $this->middleware('permission:Crear Parte Examens')->only(['create','store']);
        $this->middleware('permission:Editar Parte Examens')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Parte Examens')->only(['destroy']);
    }

    /**
     * Display a listing of the ParteExamen.
     *
     * @param ParteExamenDataTable $parteExamenDataTable
     * @return Response
     */
    public function index(ParteExamenDataTable $parteExamenDataTable)
    {
        return $parteExamenDataTable->render('parte_examens.index');
    }

    /**
     * Show the form for creating a new ParteExamen.
     *
     * @return Response
     */
    public function create()
    {
        return view('parte_examens.create');
    }

    /**
     * Store a newly created ParteExamen in storage.
     *
     * @param CreateParteExamenRequest $request
     *
     * @return Response
     */
    public function store(CreateParteExamenRequest $request)
    {
        $input = $request->all();

        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::create($input);

        Flash::success('Parte Examen guardado exitosamente.');

        return redirect(route('parteExamens.index'));
    }

    /**
     * Display the specified ParteExamen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            Flash::error('Parte Examen no encontrado');

            return redirect(route('parteExamens.index'));
        }

        return view('parte_examens.show')->with('parteExamen', $parteExamen);
    }

    /**
     * Show the form for editing the specified ParteExamen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            Flash::error('Parte Examen no encontrado');

            return redirect(route('parteExamens.index'));
        }

        return view('parte_examens.edit')->with('parteExamen', $parteExamen);
    }

    /**
     * Update the specified ParteExamen in storage.
     *
     * @param  int              $id
     * @param UpdateParteExamenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParteExamenRequest $request)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            Flash::error('Parte Examen no encontrado');

            return redirect(route('parteExamens.index'));
        }

        $parteExamen->fill($request->all());
        $parteExamen->save();

        Flash::success('Parte Examen actualizado con éxito.');

        return redirect(route('parteExamens.index'));
    }

    /**
     * Remove the specified ParteExamen from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParteExamen $parteExamen */
        $parteExamen = ParteExamen::find($id);

        if (empty($parteExamen)) {
            Flash::error('Parte Examen no encontrado');

            return redirect(route('parteExamens.index'));
        }

        $parteExamen->delete();

        Flash::success('Parte Examen deleted successfully.');

        return redirect(route('parteExamens.index'));
    }
}
