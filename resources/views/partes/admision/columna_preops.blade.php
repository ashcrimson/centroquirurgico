<!-- Button trigger modal -->
<button type="button" class="btn btn-{{$parte->preopsValidados() ? 'success' : 'outline-secondary'}} btn-sm" data-toggle="modal" data-target="#modalExPreopsValidados{{$parte->id}}">
    Preops
</button>

<!-- Modal -->
<div class="modal fade" id="modalExPreopsValidados{{$parte->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                        @if($parte->pase_preop_eu == 0 && !is_null($parte->fecha_preop_eu_valida))
                            <span class="badge badge-danger">
                                EU
                            </span>
                        @else
                            <span class="badge {{is_null($parte->fecha_preop_eu_valida) ? 'badge-secondary' : 'badge-success'}}">
                                EU
                            </span>
                        @endif
                        <br>
                        @if($parte->pase_preop_medico == 0 && !is_null($parte->fecha_preop_medico_valida))
                            <span class="badge badge-danger">
                                Medico
                            </span>
                        @else
                            <span class="badge {{is_null($parte->fecha_preop_medico_valida) ? 'badge-secondary' : 'badge-success'}}">
                                Medico
                            </span>
                        @endif
                        <br>
                        @if($parte->pase_preop_anestesista == 0 && !is_null($parte->fecha_preop_anestesista_valida))
                            <span class="badge badge-danger">
                                Anestesista
                            </span>
                        @else
                            <span class="badge {{is_null($parte->fecha_preop_anestesista_valida) ? 'badge-secondary' : 'badge-success'}}">
                                Anestesista
                            </span>
                        @endif
                        <br>
                        @if($parte->pase_banco_sagre == 0 && !is_null($parte->fecha_banco_sangre_valida))
                            <span class="badge badge-danger">
                                Banco Sangre
                            </span>
                        @else
                            <span class="badge {{is_null($parte->fecha_banco_sangre_valida) ? 'badge-secondary' : 'badge-success'}}">
                                Banco Sangre
                            </span>
                        @endif

                        @if(!is_null($parte->fecha_preop_eu_valida) || !is_null($parte->fecha_preop_medico_valida)
                            || !is_null($parte->fecha_preop_anestesista_valida || !is_null($parte->fecha_banco_sangre_valida)))
                            <table class="table table-condensed table-hover table-bordered " >
                                <thead>
                                <tr>
                                    <th>Tipo Examen</th>
                                    <th>Indicaciones</th>
                                    <th>Consentimiento</th>
                                    <th>Pase</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!is_null($parte->fecha_preop_anestesista_valida))
                                        <tr>
                                            <td>
                                                @if($parte->pase_preop_anestesista == 0 && !is_null($parte->fecha_preop_anestesista_valida))
                                                    <span class="badge badge-danger">
                                                        Anestesista
                                                    </span>
                                                @else
                                                    <span class="badge {{is_null($parte->fecha_preop_anestesista_valida) ? 'badge-secondary' : 'badge-success'}}">
                                                        Anestesista
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $parte->indicaciones_preop_anestesista }}</td>
                                            <td>{{ $parte->consentimiento_preop_anestesis == 1 ? 'SI' : 'NO' }}</td>
                                            <td>{{ $parte->pase_preop_anestesista == 1 ? 'SI' : 'NO' }}</td>
                                        </tr>
                                    @endif
                                    @if(!is_null($parte->fecha_preop_eu_valida))
                                        <tr>
                                            <td>
                                                @if($parte->pase_preop_eu == 0 && !is_null($parte->fecha_preop_eu_valida))
                                                    <span class="badge badge-danger">
                                                        EU
                                                    </span>
                                                @else
                                                    <span class="badge {{is_null($parte->fecha_preop_eu_valida) ? 'badge-secondary' : 'badge-success'}}">
                                                        EU
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $parte->indicaciones_preop_eu }}</td>
                                            <td>{{ $parte->consentimiento_preop_eu == 1 ? 'SI' : 'NO' }}</td>
                                            <td>{{ $parte->pase_preop_eu == 1 ? 'SI' : 'NO' }}</td>
                                        </tr>
                                    @endif
                                    @if(!is_null($parte->fecha_preop_medico_valida))
                                        <tr>
                                            <td>
                                                @if($parte->pase_preop_medico == 0 && !is_null($parte->fecha_preop_medico_valida))
                                                    <span class="badge badge-danger">
                                                        Medico
                                                    </span>
                                                @else
                                                    <span class="badge {{is_null($parte->fecha_preop_medico_valida) ? 'badge-secondary' : 'badge-success'}}">
                                                        Medico
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $parte->indicaciones_preop_medico }}</td>
                                            <td>{{ $parte->consentimiento_preop_medico == 1 ? 'SI' : 'NO' }}</td>
                                            <td>{{ $parte->pase_preop_medico == 1 ? 'SI' : 'NO' }}</td>
                                        </tr>
                                    @endif
                                    @if(!is_null($parte->fecha_banco_sangre_valida))
                                        <tr>
                                            <td>
                                                @if($parte->pase_banco_sagre == 0 && !is_null($parte->fecha_banco_sangre_valida))
                                                    <span class="badge badge-danger">
                                                        Banco Sangre
                                                    </span>
                                                @else
                                                    <span class="badge {{is_null($parte->fecha_banco_sangre_valida) ? 'badge-secondary' : 'badge-success'}}">
                                                        Banco Sangre
                                                    </span>
                                                @endif
                                            </td>
                                            <td>Donantes: {{ $parte->cantidad_donantes }}</td>
                                            <td></td>
                                            <td>{{ $parte->pase_banco_sagre == 1 ? 'SI' : 'NO' }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        @endif

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
