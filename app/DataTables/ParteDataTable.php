<?php

namespace App\DataTables;

use App\Models\Parte;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ParteDataTable extends DataTable
{
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
             ->editColumn('id',function (Parte $parte){

                 return $parte->id;

                 //se debe crear la vista modal_detalles
                 //return view('partes.modal_detalles',compact('parte'))->render();

             })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Parte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Parte $model)
    {
        return $model->newQuery()->with(['paciente', 'especialidad', 'preoperatorio', 'cirugiatipo', 'clasificacion','estado']);
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
            ->addAction(['width' => '120px', 'printable' => false])
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
        return [
            'paciente.run', 
            'cirugiatipo.nombre',
            'especialidad.nombre',
            'diagnostico',
            'otros_diagnosticos',
            'intervencion',
            'lateralidad',
            'otras_intervenciones',
            'cma',
            'clasificacion.nombre',
            'tiempo_quirurgico',
            'anestesia_sugerida',
            'aislamiento',
            'alergia_latex',
            'usuario_taco',
            'nececidad_cama_upc',
            'prioridad',
            'necesita_donante_sangre',
            'evaluacion_preanestesica',
            'equipo_rayos',
            'insumos_especificos',
            'preoperatorio.nombre',
            'biopsia',
            'user_ingresa',
            'estado.nombre',
            'pabellon_id',
            'fecha_pabellon',
            'fecha_digitacion',
            'instrumental',
            'observaciones'
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
