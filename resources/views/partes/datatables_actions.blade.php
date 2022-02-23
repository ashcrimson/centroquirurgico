
@role('PreOp Anestesista')
    @if(!$parte->fecha_preop_anestesista_valida)
        <div data-toggle="tooltip" title="Valida PreOp Anestesista">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpAnestesista{{$id}}">
                <i class="fa fa-check-circle"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpAnestesista{{$id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp Anestesista</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        Seguro que desea validar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <a href="{{route('partes.validar.store',['anestesia',$id])}}" type="button" class="btn btn-primary">Sí</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@role('PreOp EU')
    @if(!$parte->fecha_preop_eu_valida)
        <div data-toggle="tooltip" title="Valida PreOp EU">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpEU{{$id}}">
                <i class="fa fa-clipboard-check"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpEU{{$id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp EU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        Seguro que desea validar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <a href="{{route('partes.validar.store',['eu',$id])}}" type="button" class="btn btn-primary">Sí</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
@endrole

@role('PreOp Médico')
    @if(!$parte->fecha_preop_medico_valida)
        <div data-toggle="tooltip" title="Valida PreOp Médico">
            <a class="btn btn-outline-success btn-sm" data-toggle="modal" href="#modalFormValidaPreOpMedico{{$id}}">
                <i class="fa fa-check"></i>
            </a>
        </div>
        <div class="modal fade" id="modalFormValidaPreOpMedico{{$id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validar PreOp Médico</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        Seguro que desea validar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <a href="{{route('partes.validar.store',['medico',$id])}}" type="button" class="btn btn-primary">Sí</a>
                    </div>
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

@can('Editar Partes Admisión')
    @if($parte->puedeEditarAdmision())
    <a href="{{ route('admision.partes.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
    @endif
@endcan

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
