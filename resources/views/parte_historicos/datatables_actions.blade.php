@can('Ver Parte Historicos')
<a href="{{ route('parteHistoricos.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>
@endcan

@can('Editar Parte Historicos')
<a href="{{ route('parteHistoricos.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Eliminar Parte Historicos')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('parteHistoricos.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan

<a href="https://centro-quirurgico.hospitalnaval.cl/pdf/parte_pdf.php?tipo=ver&num={{$parteHistorico->num_parte}}" data-toggle="tooltip" title="Ver Parte"
   class='btn btn-outline-info btn-sm' target="_blank">
    <i class="fa fa-eye"></i>
</a>
