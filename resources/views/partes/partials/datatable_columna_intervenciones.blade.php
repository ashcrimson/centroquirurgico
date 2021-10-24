<!-- Button trigger modal -->
<a href="#"  data-toggle="modal" data-target="#modalIntervenciones{{$parte->id}}">
    Intervencion
</a>

<!-- Modal -->
<div class="modal fade" id="modalIntervenciones{{$parte->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">
                    Intervencion
                </h4> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @include('partes.partials.show_table_partes',['detalles' => $parte->intervencion_id])

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
