<?php

namespace App\DataTables;

use App\Models\Parte;
use App\Traits\ParteListaEsperaTrait;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ParteListaEsperaDataTable extends DataTable
{

    use ParteListaEsperaTrait;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', function(Parte $parte){

            $id = $parte->id;

            return view('partes.datatables_actions',compact('parte','id'))->render();
        })
            ->editColumn('paciente.nombre_completo',function (Parte $parte){

                return $parte->paciente->nombre_completo;

            })
            ->editColumn('rut',function (Parte $parte){

                return $parte->paciente->rut_completo ?? null;

            })
             ->editColumn('fecha_inscripcion',function (Parte $parte){

                 return $parte->fecha_inscripcion->format('Y-m-d h:i:s');

             })
            ->editColumn('id',function (Parte $parte){

                return $parte->id;

            })
            ->editColumn('Preops',function (Parte $parte){

//                    $fecha_actual = Carbon::now();
//                    $diferencia = Carbon::parse($parte->fecha_examenes)->diffInDays($fecha_actual);

//                    if ($diferencia > 180) {
//                        $attr = '#F30000';
//                    }
//                    if ($diferencia < 180) {
//                        $attr = '#99E066';
//                    }

                    $attr = $this->validarPreopColor($parte);

                return view('partes.admision.columna_preops',compact('parte','attr'));

            })
            ->editColumn('dias_espera',function (Parte $parte){

                $fechaIs = $parte->fecha_inscripcion;
                $hoy = Carbon::now();

                return $fechaIs->diffInDays($hoy);

            })
            ->editColumn('intervenciones', function (Parte $parte) {

//                $intervenciones = [];
//                foreach ($parte->parteIntervenciones()->with(['intervencionNew'])->get() as $intervencion) {
////                    array_push($intervenciones, $intervencion->intervencionNew->descripcion);
//                }
//                return $intervenciones;
                return tagsParteintervenciones($parte->parteIntervenciones);
            })
            ->rawColumns(['action','id','intervenciones']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Parte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Parte $model)
    {
        return $model->newQuery()->with(['paciente', 'especialidad','userIngresa', 'preoperatorio', 'estado','grupoBase',
            'intervencion','parteIntervenciones.intervencionNew'])
            ->join('parte_estados','parte_estados.id','=','partes.estado_id')
            ->select('partes.*','parte_estados.id as orden')
            ->orderBy('orden','asc')
            ->orderBy('partes.fecha_inscripcion', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => 'Acciones','title' => 'Acciones','width' => '120px', 'printable' => false])
            ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
            ])
            ->parameters([
                'dom'     => '
                                    <"row mb-2"
                                        <"col-sm-12 col-md-6" B>
                                        <"col-sm-12 col-md-6" f>
                                    >
                                    rt
                                    <"row"
                                        <"col-sm-6 order-2 order-sm-1" ip>
                                        <"col-sm-6 order-1 order-sm-2 text-right" l>

                                    >',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                //'scrollX' => false,
                'responsive' => true,
                'stateSave' => true,
                'buttons' => [
                    //['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    //['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {


        //el metodo ->name()
        // sirve para que datatables sepa como se llama el campo de la base de datos
        // con los que hace querys cuando ser escribe algo en el campo de busqueda

        //el metodo ->data()
        // normalmente se coloca el mismo nombre del campo que se coloca en name
        //pero en ocaciones cuando las relaciones estan escritras en camelCase laravel devuelve el attributo
        // en snake_case por lo tanto en este caso el nombre del campo se esctibe nombre_relacion.campo
        // tambien sirve para editar la columna a travez del nombre que lleve este metodo

        return [

            Column::make('id')->data('id')->name('partes.id'),

            Column::make('rut')->name('rut')->data('rut')->searchable(false)->orderable(false),

            Column::make('paciente')->name('paciente.nombre_completo')->data('paciente.nombre_completo')
                ->searchable(false)->orderable(false),

            Column::make('fecha_inscripcion'),

            Column::make('especialidad')->data('especialidad.nombre')->name('especialidad.nombre'),

            Column::make('Días espera')->data('dias_espera')->orderable(false)->searchable(false),

            Column::make('intervenciones')->data('intervenciones')->name('intervenciones')
                ->searchable(false)->orderable(false),

            Column::make('estado')->data('estado.nombre')->name('estado.nombre'),
            Column::make('Preops')->searchable(false)->orderable(false),

           Column::make('medico')->name('userIngresa.name')->data('user_ingresa.name')
               ->searchable(false)->orderable(false),

            Column::make('paciente.apellido_paterno')
                ->visible(false)
                ->exportable(false),
            Column::make('paciente.apellido_materno')
                ->visible(false)->exportable(false),
            Column::make('paciente.primer_nombre')
                ->visible(false)->exportable(false),
            Column::make('paciente.segundo_nombre')
                ->visible(false)->exportable(false),
            Column::make('paciente.run')
                ->visible(false)->exportable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'partesdatatable_' . time();
    }
}
