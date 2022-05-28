<?php

namespace App\Http\Controllers;

use App\DataTables\IntervencionesNewDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIntervencionesNewRequest;
use App\Http\Requests\UpdateIntervencionesNewRequest;
use App\Models\IntervencionesNew;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IntervencionesNewController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Intervenciones News')->only(['show']);
        $this->middleware('permission:Crear Intervenciones News')->only(['create','store']);
        $this->middleware('permission:Editar Intervenciones News')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Intervenciones News')->only(['destroy']);
    }

    /**
     * Display a listing of the IntervencionesNew.
     *
     * @param IntervencionesNewDataTable $intervencionesNewDataTable
     * @return Response
     */
    public function index(IntervencionesNewDataTable $intervencionesNewDataTable)
    {
        return $intervencionesNewDataTable->render('intervenciones_news.index');
    }

    /**
     * Show the form for creating a new IntervencionesNew.
     *
     * @return Response
     */
    public function create()
    {
        return view('intervenciones_news.create');
    }

    /**
     * Store a newly created IntervencionesNew in storage.
     *
     * @param CreateIntervencionesNewRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervencionesNewRequest $request)
    {
        $input = $request->all();

        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::create($input);

        Flash::success('Intervenciones New guardado exitosamente.');

        return redirect(route('intervencionesNews.index'));
    }

    /**
     * Display the specified IntervencionesNew.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            Flash::error('Intervenciones New no encontrado');

            return redirect(route('intervencionesNews.index'));
        }

        return view('intervenciones_news.show')->with('intervencionesNew', $intervencionesNew);
    }

    /**
     * Show the form for editing the specified IntervencionesNew.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            Flash::error('Intervenciones New no encontrado');

            return redirect(route('intervencionesNews.index'));
        }

        return view('intervenciones_news.edit')->with('intervencionesNew', $intervencionesNew);
    }

    /**
     * Update the specified IntervencionesNew in storage.
     *
     * @param  int              $id
     * @param UpdateIntervencionesNewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervencionesNewRequest $request)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            Flash::error('Intervenciones New no encontrado');

            return redirect(route('intervencionesNews.index'));
        }

        $intervencionesNew->fill($request->all());
        $intervencionesNew->save();

        Flash::success('Intervenciones New actualizado con éxito.');

        return redirect(route('intervencionesNews.index'));
    }

    /**
     * Remove the specified IntervencionesNew from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IntervencionesNew $intervencionesNew */
        $intervencionesNew = IntervencionesNew::find($id);

        if (empty($intervencionesNew)) {
            Flash::error('Intervenciones New no encontrado');

            return redirect(route('intervencionesNews.index'));
        }

        $intervencionesNew->delete();

        Flash::success('Intervenciones New deleted successfully.');

        return redirect(route('intervencionesNews.index'));
    }
}
