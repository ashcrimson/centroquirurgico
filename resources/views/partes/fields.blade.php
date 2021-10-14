


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

                <!-- Diagnostico Field -->
                <div class="form-group col-sm-4 col-lg-4">
                    {!! Form::label('diagnostico', 'Diagnostico:') !!}
                    {!! Form::text('diagnostico', null, ['class' => 'form-control']) !!}
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
                    <label class="checkbox-inline">
                        {!! Form::hidden('lateralidad', 0) !!}
                        {!! Form::checkbox('lateralidad', '1', null) !!}
                    </label>
                </div>


                <!-- Otras Intervenciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
                    {!! Form::textarea('otras_intervenciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Cma Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('cma', 'Cma:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('cma', 0) !!}
                        {!! Form::checkbox('cma', '1', null) !!}
                    </label>
                </div>


                <!-- Clasificacion Id Field -->
                <div class="form-group col-sm-4">
                    <select-clasificacion
                        label="Clasificación"
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
                    {!! Form::label('aislamiento', 'Aislamiento:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('aislamiento', 0) !!}
                        {!! Form::checkbox('aislamiento', '1', null) !!}
                    </label>
                </div>


                <!-- Alergia Latex Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('alergia_latex', 'Alergia Latex:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('alergia_latex', 0) !!}
                        {!! Form::checkbox('alergia_latex', '1', null) !!}
                    </label>
                </div>


                <!-- Usuario Taco Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('usuario_taco', 'Usuario Taco:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('usuario_taco', 0) !!}
                        {!! Form::checkbox('usuario_taco', '1', null) !!}
                    </label>
                </div>


                <!-- Nececidad Cama Upc Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('nececidad_cama_upc', 0) !!}
                        {!! Form::checkbox('nececidad_cama_upc', '1', null) !!}
                    </label>
                </div>


                <!-- Prioridad Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('prioridad', 'Prioridad:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('prioridad', 0) !!}
                        {!! Form::checkbox('prioridad', '1', null) !!}
                    </label>
                </div>


                <!-- Necesita Donante Sangre Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('necesita_donante_sangre', 0) !!}
                        {!! Form::checkbox('necesita_donante_sangre', '1', null) !!}
                    </label>
                </div>


                <!-- Evaluacion Preanestesica Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('evaluacion_preanestesica', 0) !!}
                        {!! Form::checkbox('evaluacion_preanestesica', '1', null) !!}
                    </label>
                </div>


                <!-- Equipo Rayos Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('equipo_rayos', 0) !!}
                        {!! Form::checkbox('equipo_rayos', '1', null) !!}
                    </label>
                </div>


                <!-- Insumos Especificos Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('insumos_especificos', 'Insumos Especificos:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('insumos_especificos', 0) !!}
                        {!! Form::checkbox('insumos_especificos', '1', null) !!}
                    </label>
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
                    {!! Form::label('biopsia', 'Biopsia:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('biopsia', 0) !!}
                        {!! Form::checkbox('biopsia', '1', null) !!}
                    </label>
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
            clasificacion: @json($parte->clasificacion ?? Clasificacion::find(old('clasificacion_id')) ?? null),
            preoperatorio: @json($parte->preoperatorio ?? Preoperatorio::find(old('preoperatorio_id')) ?? null),
        },
        methods: {

        }
    });
</script>
@endpush
