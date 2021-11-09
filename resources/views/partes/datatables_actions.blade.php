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
