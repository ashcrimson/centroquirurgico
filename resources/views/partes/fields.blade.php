


<div class="col-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos Paciente</h3>

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
    <div class="card card-outline card-info ">
        <div class="card-header">
            <h3 class="card-title">Datos Registro</h3>

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
                <div class="form-group col-sm-6">
                    <select-cirugia-tipo
                        label="Tipo Cirugía"
                        v-model="cirugia_tipo" >

                    </select-cirugia-tipo>
                </div>

                <!-- Especialidad Id Field -->
                <div class="form-group col-sm-6">
                    <select-especialidad
                        label="Especialidad"
                        v-model="especialidad" >

                    </select-especialidad>
                </div>

                <!-- Diagnostico Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('diagnostico', 'Diagnostico:') !!}
                    {!! Form::textarea('diagnostico', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Otros Diagnosticos Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otros_diagnosticos', 'Otros Diagnosticos:') !!}
                    {!! Form::textarea('otros_diagnosticos', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Intervencion Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('intervencion', 'Intervencion:') !!}
                    {!! Form::textarea('intervencion', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Lateralidad Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('lateralidad', 'Lateralidad:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('lateralidad', 0) !!}
                        {!! Form::checkbox('lateralidad', '1', null) !!}
                    </label>
                </div>


                <!-- Otras Intervenciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
                    {!! Form::textarea('otras_intervenciones', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Cma Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('cma', 'Cma:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('cma', 0) !!}
                        {!! Form::checkbox('cma', '1', null) !!}
                    </label>
                </div>


                <!-- Clasificacion Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('clasificacion_id', 'Clasificacion Id:') !!}
                    {!! Form::number('clasificacion_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Tiempo Quirurgico Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}
                    {!! Form::number('tiempo_quirurgico', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Anestesia Sugerida Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
                    {!! Form::text('anestesia_sugerida', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Aislamiento Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('aislamiento', 'Aislamiento:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('aislamiento', 0) !!}
                        {!! Form::checkbox('aislamiento', '1', null) !!}
                    </label>
                </div>


                <!-- Alergia Latex Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('alergia_latex', 'Alergia Latex:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('alergia_latex', 0) !!}
                        {!! Form::checkbox('alergia_latex', '1', null) !!}
                    </label>
                </div>


                <!-- Usuario Taco Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('usuario_taco', 'Usuario Taco:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('usuario_taco', 0) !!}
                        {!! Form::checkbox('usuario_taco', '1', null) !!}
                    </label>
                </div>


                <!-- Nececidad Cama Upc Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('nececidad_cama_upc', 0) !!}
                        {!! Form::checkbox('nececidad_cama_upc', '1', null) !!}
                    </label>
                </div>


                <!-- Prioridad Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('prioridad', 'Prioridad:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('prioridad', 0) !!}
                        {!! Form::checkbox('prioridad', '1', null) !!}
                    </label>
                </div>


                <!-- Necesita Donante Sangre Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('necesita_donante_sangre', 0) !!}
                        {!! Form::checkbox('necesita_donante_sangre', '1', null) !!}
                    </label>
                </div>


                <!-- Evaluacion Preanestesica Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('evaluacion_preanestesica', 0) !!}
                        {!! Form::checkbox('evaluacion_preanestesica', '1', null) !!}
                    </label>
                </div>


                <!-- Equipo Rayos Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('equipo_rayos', 0) !!}
                        {!! Form::checkbox('equipo_rayos', '1', null) !!}
                    </label>
                </div>


                <!-- Insumos Especificos Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('insumos_especificos', 'Insumos Especificos:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('insumos_especificos', 0) !!}
                        {!! Form::checkbox('insumos_especificos', '1', null) !!}
                    </label>
                </div>


                <!-- Preoperatorio Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('preoperatorio_id', 'Preoperatorio Id:') !!}
                    {!! Form::number('preoperatorio_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Biopsia Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('biopsia', 'Biopsia:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('biopsia', 0) !!}
                        {!! Form::checkbox('biopsia', '1', null) !!}
                    </label>
                </div>


                <!-- User Ingresa Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('user_ingresa', 'User Ingresa:') !!}
                    {!! Form::number('user_ingresa', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Estado Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('estado_id', 'Estado Id:') !!}
                    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Pabellon Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pabellon_id', 'Pabellon Id:') !!}
                    {!! Form::number('pabellon_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Fecha Pabellon Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_pabellon', 'Fecha Pabellon:') !!}
                    {!! Form::date('fecha_pabellon', null, ['class' => 'form-control','id'=>'fecha_pabellon']) !!}
                </div>

            <!-- Fecha Digitacion Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_digitacion', 'Fecha Digitacion:') !!}
                    {!! Form::date('fecha_digitacion', null, ['class' => 'form-control','id'=>'fecha_digitacion']) !!}
                </div>


            <!-- Instrumental Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('instrumental', 'Instrumental:') !!}
                    {!! Form::textarea('instrumental', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Observaciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('observaciones', 'Observaciones:') !!}
                    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
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
            cirugia_tipo: null,
            especialidad: null,
        },
        methods: {

        }
    });
</script>
@endpush
