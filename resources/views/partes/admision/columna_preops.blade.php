<!-- Button trigger modal -->
<button type="button" class="btn btn-{{$parte->preopsValidados() ? 'success' : 'outline-secondary'}} btn-sm" data-toggle="modal" data-target="#modalExPreopsValidados{{$parte->id}}">
    Preops
</button>

<!-- Modal -->
<div class="modal fade" id="modalExPreopsValidados{{$parte->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">
                    Validación examenes preops
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <span class="badge {{is_null($parte->fecha_preop_eu_valida) ? 'badge-secondary' : 'badge-success'}}">
                            EU
                        </span>
                        <br>
                        <span class="badge {{is_null($parte->fecha_preop_medico_valida) ? 'badge-secondary' : 'badge-success'}}">
                            Medico
                        </span>
                        <br>
                        <span class="badge {{is_null($parte->fecha_preop_anestesista_valida) ? 'badge-secondary' : 'badge-success'}}">
                            Anestesista
                        </span>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
