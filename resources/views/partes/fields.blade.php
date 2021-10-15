


<div class="col-12">
    <div class="card card-secondary ">
        <div class="card-header py-1 px-3">
            <h3 class="card-title">Información Paciente</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">
                @include('pacientes.fields')
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>





<div class="col-sm-12 mb-3">
    <div class="card card-secondary ">
        <div class="card-header py-1 px-3">
            <h3 class="card-title">Información de la Cirugía</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="fieldsPartes">
            <div class="form-row">


                <!-- Cirugia Tipo Id Field -->
                <div class="form-group col-sm-4">
                    <select-cirugia-tipo
                        label="Tipo Cirugía"
                        v-model="cirugia_tipo" >

                    </select-cirugia-tipo>
                </div>

                <!-- Especialidad Id Field -->
                <div class="form-group col-sm-4">
                    <select-especialidad
                        label="Especialidad"
                        v-model="especialidad" >

                    </select-especialidad>
                </div>

                <div class="form-group col-sm-4">
                    <select-diagnostico
                        label="Diagnostico"
                        v-model="diagnostico_id" >

                    </select-diagnostico>
                </div>

                <!-- Otros Diagnosticos Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otros_diagnosticos', 'Otros Diagnosticos:') !!}
                    {!! Form::textarea('otros_diagnosticos', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Intervencion Field -->
                <div class="form-group col-sm-8 col-lg-8">
                    {!! Form::label('intervencion', 'Intervencion:') !!}
                    {!! Form::text('intervencion', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Lateralidad Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('lateralidad', 'Lateralidad:') !!}
                    {!!
                        Form::select(
                            'lateralidad',
                            [
                                null => 'Seleccione uno...',
                                'Izquierda' => 'Izquierda',
                                'Derecha'=> 'Derecha',
                                'Bilateral' => 'Bilateral',
                                'No_Aplica' => 'No Aplica',
                            ]
                            , null
                            , ['id'=>'volumen_suero','class' => 'form-control','style'=>'width: 100%']
                        )
                    !!}
                </div>


                <!-- Otras Intervenciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
                    {!! Form::textarea('otras_intervenciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Cma Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('cma', 'Cma:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="cma" id="cma"
                       value="1"
                        {{ ($parte->cma ?? old('cma') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Clasificacion Id Field -->
                <div class="form-group col-sm-4">
                    <select-clasificacion
                        label="Clasificación ASA"
                        v-model="clasificacion" >

                    </select-clasificacion>
                </div>

                <!-- Tiempo Quirurgico Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}
                    {!! Form::number('tiempo_quirurgico', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Anestesia Sugerida Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
                    {!! Form::text('anestesia_sugerida', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Aislamiento Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('aislamiento', 'Aislamiento:') !!}<br>

                <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="aislamiento" id="aislamiento"
                       value="1"
                        {{ ($parte->aislamiento ?? old('aislamiento') ?? false) ? 'checked' : '' }}>
                   
                </div>


                <!-- Alergia Latex Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('alergia_latex', 'Alergia Latex:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="alergia_latex" id="alergia_latex"
                       value="1"
                        {{ ($parte->alergia_latex ?? old('alergia_latex') ?? false) ? 'checked' : '' }}>
                    
                </div>


                <!-- Usuario Taco Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('usuario_taco', 'Usuario Taco:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="usuario_taco" id="usuario_taco"
                       value="1"
                        {{ ($parte->alergia_latex ?? old('alergia_latex') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Nececidad Cama Upc Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="nececidad_cama_upc" id="nececidad_cama_upc"
                       value="1"
                        {{ ($parte->nececidad_cama_upc ?? old('nececidad_cama_upc') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Prioridad Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('prioridad', 'Prioridad:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="prioridad" id="prioridad"
                       value="1"
                        {{ ($parte->prioridad ?? old('prioridad') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Necesita Donante Sangre Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="necesita_donante_sangre" id="necesita_donante_sangre"
                       value="1"
                        {{ ($parte->necesita_donante_sangre ?? old('necesita_donante_sangre') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Evaluacion Preanestesica Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="evaluacion_preanestesica" id="evaluacion_preanestesica"
                       value="1"
                        {{ ($parte->evaluacion_preanestesica ?? old('evaluacion_preanestesica') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Equipo Rayos Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="equipo_rayos" id="equipo_rayos"
                       value="1"
                        {{ ($parte->equipo_rayos ?? old('equipo_rayos') ?? false) ? 'checked' : '' }}>
                </div>


                <!-- Insumos Especificos Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('insumos_especificos', 'Insumos Especificos:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="insumos_especificos" id="insumos_especificos"
                       value="1"
                        {{ ($parte->insumos_especificos ?? old('insumos_especificos') ?? false) ? 'checked' : '' }}>
                </div>

                <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                <!-- Preoperatorio Id Field -->
                <div class="form-group col-sm-6">
                    <select-preoperatorio
                        label="Ex Preoperatorios"
                        v-model="preoperatorio" >

                    </select-preoperatorio>
                </div>

                <!-- Biopsia Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('biopsia', 'Biopsia:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="biopsias" id="biopsia"
                       value="1"
                        {{ ($parte->biopsia ?? old('biopsia') ?? false) ? 'checked' : '' }}>
                </div>

                <!-- Medicamentos Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('medicamentos', 'Medicamentos:') !!}
                    {!! Form::textarea('medicamentos', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>



            <!-- Instrumental Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('instrumental', 'Instrumental:') !!}
                    {!! Form::textarea('instrumental', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Observaciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('observaciones', 'Observaciones:') !!}
                    {!! Form::textarea('observaciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>



            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@push('scripts')
<script>
    const app = new Vue({
        el: '#fieldsPartes',
        name: 'fieldsPartes',
        created() {

        },
        data: {
            cirugia_tipo: @json($parte->cirugiaTipo ?? CirugiaTipo::find(old('cirugia_tipo_id')) ?? null),
            especialidad: @json($parte->especialidad ?? Especialidad::find(old('especialidad_id')) ?? null),
            diagnostico: @json($parte->diagnostico_id ?? App\Models\diagnosticos::find(old('diagnostico_id')) ?? null),
            clasificacion: @json($parte->clasificacion ?? Clasificacion::find(old('clasificacion_id')) ?? null),
            preoperatorio: @json($parte->preoperatorio ?? Preoperatorio::find(old('preoperatorio_id')) ?? null),
        },
        methods: {

        }
    });
</script>
@endpush
