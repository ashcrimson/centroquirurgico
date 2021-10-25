<table class="table table-bordered table-sm mb-0">
    <thead>
        <tr>
            <td>Intervencion</td>
            <td>Lateralidad</td>
        </tr>
    </thead>
    <tbody>
    @forelse($detalles as $det)
        <tr>
            <td>{{$det->intervencion->nombre}}</td>
            <td>{{$det->lateralidad}}</td>
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="20">Ningun registro agregado</td>
        </tr>
    @endforelse
    </tbody>
</table>
