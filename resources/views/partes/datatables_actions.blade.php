
@role('PreOp Anestesista')
    @if(!$parte->fecha_preop_anestesista_valida || $parte->pase_preop_anestesista != 1)
        <div data-toggle="tooltip" title="Valida PreOp Anestesista">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpAnestesista{{$id}}">
                <i class="fa fa-check-circle"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpAnestesista{{$id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp Anestesista</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="GET" action="{{ route('partes.validar.store', ['anestesia',$id]) }}" role="form" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-row col-sm-12">

                                <div class="form-group col-sm-6">
                                    {!! Form::label('indicaciones_preop_anestesista', 'Indicaciones:') !!}
                                    <textarea class="form-control" name="indicaciones_preop_anestesista" rows="2" cols="2" required></textarea>
                                </div>

{{--                                <div class="form-group col-sm-6">--}}
{{--                                    {!! Form::label('consentimiento_preop_anestesis', 'Consentimiento informado, firmado y archivado:') !!}--}}
{{--                                    <select name="consentimiento_preop_anestesis" id="consentimiento_preop_anestesis" class="form-control" required >--}}
{{--                                        <option value="">Selecciona...</option>--}}
{{--                                        <option value="1" @if(old('consentimiento_preop_anestesis') == '1') selected @endif>SI</option>--}}
{{--                                        <option value="0" @if(old('consentimiento_preop_anestesis') == '0') selected @endif>NO</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="form-group col-sm-6">
                                    {!! Form::label('pase_preop_anestesista', 'Pase:') !!}
                                    <select name="pase_preop_anestesista" id="pase_preop_anestesista" class="form-control" required >
                                        <option value="">Selecciona...</option>
                                        <option value="1" @if(old('pase_preop_anestesista') == '1') selected @endif>SI</option>
                                        <option value="0" @if(old('pase_preop_anestesista') == '0') selected @endif>NO</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
{{--                            href="{{route('partes.validar.store',['anestesia',$id])}}"--}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@role('PreOp EU')
    @if(!$parte->fecha_preop_eu_valida || $parte->pase_preop_eu != 1)
        <div data-toggle="tooltip" title="Valida PreOp EU">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpEU{{$id}}">
                <i class="fa fa-clipboard-check"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpEU{{$id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp EU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="GET" action="{{route('partes.validar.store',['eu',$id])}}" role="form" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-row col-sm-12">

                                <div class="form-group col-sm-6">
                                    {!! Form::label('indicaciones_preop_eu', 'Indicaciones:') !!}
                                    <textarea class="form-control" name="indicaciones_preop_eu" rows="2" cols="2" required></textarea>
                                </div>

{{--                                <div class="form-group col-sm-6">--}}
{{--                                    {!! Form::label('consentimiento_preop_eu', 'Consentimiento informado, firmado y archivado:') !!}--}}
{{--                                    <select name="consentimiento_preop_eu" id="consentimiento_preop_eu" class="form-control" required >--}}
{{--                                        <option value="">Selecciona...</option>--}}
{{--                                        <option value="1" @if(old('consentimiento_preop_eu') == '1') selected @endif>SI</option>--}}
{{--                                        <option value="0" @if(old('consentimiento_preop_eu') == '0') selected @endif>NO</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="form-group col-sm-6">
                                    {!! Form::label('pase_preop_eu', 'Pase:') !!}
                                    <select name="pase_preop_eu" id="pase_preop_eu" class="form-control" required >
                                        <option value="">Selecciona...</option>
                                        <option value="1" @if(old('pase_preop_eu') == '1') selected @endif>SI</option>
                                        <option value="0" @if(old('pase_preop_eu') == '0') selected @endif>NO</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>--}}
{{--                            href="{{route('partes.validar.store',['eu',$id])}}"--}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@role('PreOp Médico')
    @if(!$parte->fecha_preop_medico_valida || $parte->pase_preop_medico != 1)
        <div data-toggle="tooltip" title="Valida PreOp Médico">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpMedico{{$id}}">
                <i class="fa fa-check"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpMedico{{$id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp Médico</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="GET" action="{{route('partes.validar.store',['medico',$id])}}" role="form" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-row col-sm-12">

                                <div class="form-group col-sm-6">
                                    {!! Form::label('indicaciones_preop_medico', 'Indicaciones:') !!}
                                    <textarea class="form-control" name="indicaciones_preop_medico" rows="2" cols="2" required></textarea>
                                </div>

{{--                                <div class="form-group col-sm-6">--}}
{{--                                    {!! Form::label('consentimiento_preop_medico', 'Consentimiento informado, firmado y archivado:') !!}--}}
{{--                                    <select name="consentimiento_preop_medico" id="consentimiento_preop_medico" class="form-control" required >--}}
{{--                                        <option value="">Selecciona...</option>--}}
{{--                                        <option value="1" @if(old('consentimiento_preop_medico') == '1') selected @endif>SI</option>--}}
{{--                                        <option value="0" @if(old('consentimiento_preop_medico') == '0') selected @endif>NO</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="form-group col-sm-6">
                                    {!! Form::label('pase_preop_medico', 'Pase:') !!}
                                    <select name="pase_preop_medico" id="pase_preop_medico" class="form-control" required >
                                        <option value="">Selecciona...</option>
                                        <option value="1" @if(old('pase_preop_medico') == '1') selected @endif>SI</option>
                                        <option value="0" @if(old('pase_preop_medico') == '0') selected @endif>NO</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>--}}
{{--                            href="{{route('partes.validar.store',['medico',$id])}}"--}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@role('Banco de Sangre')
    @if(!$parte->fecha_banco_sangre_valida || $parte->pase_banco_sagre)
        <div data-toggle="tooltip" title="Valida Banco Sangre">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidabancoSangre{{$id}}">
                <i class="fa fa-check"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidabancoSangre{{$id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar Banco Sangre</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="GET" action="{{route('partes.validar.store',['banco_sangre',$id])}}" role="form" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-row col-sm-12">

                                <div class="form-group col-sm-6">
                                    {!! Form::label('cantidad_donantes', 'Cantidad Donantes:') !!}
                                    <input type="number" class="form-control" name="cantidad_donantes" required >
                                </div>

                                <div class="form-group col-sm-6">
                                    {!! Form::label('pase_banco_sagre', 'Pase:') !!}
                                    <select name="pase_banco_sagre" id="pase_banco_sagre" class="form-control" required >
                                        <option value="">Selecciona...</option>
                                        <option value="1" @if(old('pase_banco_sagre') == '1') selected @endif>SI</option>
                                        <option value="0" @if(old('pase_banco_sagre') == '0') selected @endif>NO</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>--}}
                            {{--                            href="{{route('partes.validar.store',['medico',$id])}}"--}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@can('Ver Partes')
<a href="{{ route('partes.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>
@endcan

@can('Editar Partes')
    @if($parte->puedeEditar())
        <a href="{{ route('partes.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
            <i class="fa fa-edit"></i>
        </a>
    @endif
@endcan

@role('Admisión')
    <a href="{{ route('admision.partes.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>

    <a class="btn btn-outline-info btn-sm" title="Partes Histórico" data-toggle="modal" href="#modalFormPartesHistorico{{$id}}">
        <i class="fa fa-list"></i>
    </a>

    <div class="modal fade" id="modalFormPartesHistorico{{$id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Partes Histórico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-row col-sm-12">

                    <table class="table table-hover text-nowrap" id="tablePartesHistorico">
                        <thead>
                        <tr>
                            <th>No Parte</th>
                            <th>Fecha</th>
                            <th>Parte</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($parte->parteHistoricos() as $historico)
                                <tr>
                                    <td>{{$historico->num_parte}}</td>
                                    <td>{{$historico->fecha ? $historico->fecha->format('d/m/Y') : ''}}</td>
                                    <td>
                                        <a href="https://centro-quirurgico.hospitalnaval.cl/pdf/parte_pdf.php?tipo=ver&num={{$historico->num_parte}}" data-toggle="tooltip" title="Ver"
                                           class='btn btn-outline-info btn-sm' target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endrole

@can('Eliminar Partes')
    @if($parte->puedeEliminar())
        <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
            <i class="fa fa-trash-alt"></i>
        </a>


        <form action="{{ route('partes.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
            @method('DELETE')
            @csrf
        </form>
    @endif
@endcan

<a target="_blank" class="btn btn-default btn-sm" title="Imprimir" href="{{ route('partes.imprimir.parte', $id) }}">
    <i class="fa fa-print"></i>
</a>
