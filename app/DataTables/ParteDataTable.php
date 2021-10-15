<?php

namespace App\DataTables;

use App\Models\Parte;
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
        return $model->newQuery();
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
            Column::make('paciente_id'),
            Column::make('cirugia_tipo_id'),
            Column::make('especialidad_id'),
            Column::make('diagnostico_id'),
            Column::make('otros_diagnosticos'),
            Column::make('medicamentos'),
            Column::make('intervencion_id'),
            Column::make('lateralidad'),
            Column::make('otras_intervenciones'),
            Column::make('cma'),
            Column::make('clasificacion_id'),
            Column::make('tiempo_quirurgico'),
            Column::make('anestesia_sugerida'),
            Column::make('aislamiento'),
            Column::make('alergia_latex'),
            Column::make('usuario_taco'),
            Column::make('nececidad_cama_upc'),
            Column::make('prioridad'),
            Column::make('necesita_donante_sangre'),
            Column::make('evaluacion_preanestesica'),
            Column::make('equipo_rayos'),
            Column::make('insumos_especificos'),
            Column::make('preoperatorio_id'),
            Column::make('biopsia'),
            Column::make('user_ingresa'),
            Column::make('estado_id'),
            Column::make('pabellon_id'),
            Column::make('fecha_pabellon'),
            Column::make('fecha_digitacion'),
            Column::make('instrumental'),
            Column::make('observaciones')
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
