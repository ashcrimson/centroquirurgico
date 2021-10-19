<!-- Paciente Id Field -->
{!! Form::label('paciente', 'Paciente:') !!}
{!! $parte->paciente->nombre_completo !!}<br>


<!-- Cirugia Tipo Id Field -->
{!! Form::label('tipo_cirugia', 'Tipo Cirugía:') !!}
{!! $parte->cirugiaTipo->nombre !!}<br>


<!-- Especialidad Id Field -->
{!! Form::label('especialidad', 'Especialidad:') !!}
{!! $parte->especialidad->nombre !!}<br>


<!-- Diagnostico Id Field -->
{!! Form::label('diagnostico', 'Diagnostico:') !!}
{!! $parte->diagnostico->nombre !!}<br>


<!-- Otros Diagnosticos Field -->
{!! Form::label('otros_diagnosticos', 'Otros Diagnosticos:') !!}
{!! $parte->otros_diagnosticos !!}<br>


<!-- Medicamentos Field -->
{!! Form::label('medicamentos', 'Medicamentos:') !!}
{!! $parte->medicamentos !!}<br>


<!-- Intervencion Id Field -->
{!! Form::label('intervencion', 'Intervencion:') !!}
{!! $parte->intervencion->nombre !!}<br>


<!-- Lateralidad Field -->
{!! Form::label('lateralidad', 'Lateralidad:') !!}
{!! $parte->lateralidad !!}<br>


<!-- Otras Intervenciones Field -->
{!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
{!! $parte->otras_intervenciones !!}<br>


<!-- Cma Field -->
{!! Form::label('cma', 'Cma:') !!}
{!! $parte->cma !!}<br>


<!-- Clasificacion Id Field -->
{!! Form::label('clasificacion_asa', 'Clasificacion ASA:') !!}
{!! $parte->clasificacion->nombre !!}<br>


<!-- Tiempo Quirurgico Field -->
{!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}
{!! $parte->tiempo_quirurgico !!}<br>


<!-- Anestesia Sugerida Field -->
{!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
{!! $parte->anestesia_sugerida !!}<br>


<!-- Aislamiento Field -->
{!! Form::label('aislamiento', 'Aislamiento:') !!}
{!! $parte->aislamiento ? "Si" : "No" !!}<br>


<!-- Alergia Latex Field -->
{!! Form::label('alergia_latex', 'Alergia Latex:') !!}
{!! $parte->alergia_latex ? "Si" : "No" !!}<br>


<!-- Usuario Taco Field -->
{!! Form::label('usuario_taco', 'Usuario Taco:') !!}
{!! $parte->usuario_taco ? "Si" : "No" !!}<br>


<!-- Nececidad Cama Upc Field -->
{!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}
{!! $parte->nececidad_cama_upc ? "Si" : "No" !!}<br>


<!-- Prioridad Field -->
{!! Form::label('prioridad', 'Prioridad:') !!}
{!! $parte->prioridad ? "Si" : "No" !!}<br>


<!-- Necesita Donante Sangre Field -->
{!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}
{!! $parte->necesita_donante_sangre ? "Si" : "No" !!}<br>


<!-- Evaluacion Preanestesica Field -->
{!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}
{!! $parte->evaluacion_preanestesica ? "Si" : "No" !!}<br>


<!-- Equipo Rayos Field -->
{!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}
{!! $parte->equipo_rayos ? "Si" : "No" !!}<br>


<!-- Insumos Especificos Field -->
{!! Form::label('insumos_especificos', 'Insumos Especificos:') !!}
{!! $parte->insumos_especificos ? "Si" : "No" !!}<br>


<!-- Preoperatorio Id Field -->
{!! Form::label('examenes_preoperatorios', 'Examenes Preoperatorios:') !!}
{!! $parte->preoperatorio->nombre !!}<br>


<!-- Biopsia Field -->
{!! Form::label('biopsia', 'Biopsia:') !!}
{!! $parte->biopsia !!}<br>


<!-- User Ingresa Field -->
{!! Form::label('ingresado_por', 'Ingresado Por:') !!}
{!! $parte->userIngresa->name !!}<br>


<!-- Estado Id Field -->
{!! Form::label('estado', 'Estado:') !!}
{!! $parte->estado->nombre !!}<br>


<!-- Pabellon Id Field -->
{!! Form::label('pabellon_id', 'Pabellon Id:') !!}
{!! $parte->pabellon_id !!}<br>


<!-- Fecha Pabellon Field -->
{!! Form::label('fecha_pabellon', 'Fecha Pabellon:') !!}
{!! $parte->fecha_pabellon !!}<br>


<!-- Fecha Digitacion Field -->
{!! Form::label('fecha_digitacion', 'Fecha Digitacion:') !!}
{!! $parte->fecha_digitacion !!}<br>


<!-- Instrumental Field -->
{!! Form::label('instrumental', 'Instrumental:') !!}
{!! $parte->instrumental !!}<br>


<!-- Observaciones Field -->
{!! Form::label('observaciones', 'Observaciones:') !!}
{!! $parte->observaciones !!}<br>


