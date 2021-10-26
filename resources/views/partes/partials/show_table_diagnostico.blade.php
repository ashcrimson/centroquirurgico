<table class="table table-bordered table-sm mb-0">
    <thead>
        <tr>
            <td>Diagnóstico</td>
        </tr>
    </thead>
    <tbody>
    @forelse($detalles as $det)
        <tr>
            <td>{{$det->parte->nombre}}</td>
       
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="20">Ningun registro agregado</td>
        </tr>
    @endforelse
    </tbody>
</table>
