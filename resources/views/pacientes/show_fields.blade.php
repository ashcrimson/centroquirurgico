<!-- Run Field -->
{!! Form::label('run', 'Rut Paciente:') !!}
{!! $paciente->rut_completo !!}<br>


<!-- Apellido Paterno Field -->
{!! Form::label('nombre_paciente', 'Nombre Paciente:') !!}
{!! $paciente->nombre_completo !!}<br>


<!-- Fecha Nac Field -->
{!! Form::label('fecha_nac', 'Fecha Nac:') !!}
{!! fechaLtn($paciente->fecha_nac) !!}<br>


<!-- Sexo Field -->
{!! Form::label('sexo', 'Sexo:') !!}
{!! $paciente->sexo !!}<br>

