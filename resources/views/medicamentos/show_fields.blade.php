<!-- Nombre Field -->
{!! Form::label('nombre', 'Nombre:') !!}
{!! $medicamento->nombre !!}<br>

<!-- suspension_dias Field -->
{!! Form::label('suspension_dias', 'Suspension (días):') !!}
{!! $medicamento->suspension_dias !!}<br>

<!-- reiniciar Field -->
{!! Form::label('reiniciar', 'Reiniciar:') !!}
{!! $medicamento->reiniciar !!}<br>

<!-- consideraciones Field -->
{!! Form::label('consideraciones', 'Consideraciones:') !!}
{!! $medicamento->consideraciones !!}<br>
