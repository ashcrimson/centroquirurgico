
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

                <!-- Cma Field -->
                <div class="form-group col-sm-4" >
                    {!! Form::label('cma', 'Cma:') !!}
                    <span v-show="cirugia_tipo && !esCirugiaMayor " class="text-muted">No aplica par el tipo de cirugia</span>
                    <br>

                    <input type="checkbox" data-toggle="toggle"
                           data-size="normal"
                           data-on="Si" data-off="No"
                           data-style="ios"
                           name="cma"
                           id="cma"
                           :disabled="!esCirugiaMayor"
                       value="1"
                        {{ ($parte->cma ?? old('cma') ?? false) ? 'checked' : '' }}>
                </div>

                <div class="form-group col-sm-12">
                    <select-diagnostico
                        label="Diagnostico"
                        v-model="diagnostico" >

                    </select-diagnostico>
                </div>

                <!-- Otros Diagnosticos Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otros_diagnosticos', 'Otros Diagnosticos:') !!}
                    {!! Form::textarea('otros_diagnosticos', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Intervencion Field -->
                <div class="form-group col-sm-8 col-lg-8">
                    <select-intervencion
                        label="Intervencion"
                        v-model="intervencion" >

                    </select-intervencion>
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
                            , ['id'=>'lateralidad','class' => 'form-control','style'=>'width: 100%']
                        )
                    !!}
                </div>


                <!-- Otras Intervenciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
                    {!! Form::textarea('otras_intervenciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>




                <div class="form-group col-sm-4">
                    {!! Form::label('clasificacion', 'Clasificación ASA:') !!}
                    <!-- Clasificacion Id Field -->
                    <multiselect v-model="clasificacion" :options="clasificaciones" label="nombre" placeholder="Seleccione uno...">
                    </multiselect>
                    <input type="hidden" name="clasificacion_id" :value="clasificacion ? clasificacion.id : null">
                </div>
                <!-- Tiempo Quirurgico Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}
                    {!!
                        Form::select(
                            'tiempo_quirurgico',
                            [
                                null => 'Seleccione uno...',
                                30 => 30,
                                60 => 60,
                                90 => 90,
                                120 => 120,
                                150 => 150,
                                180 => 180,
                                210 => 210,
                                240 => 240,
                                270 => 270,
                                300 => 300,
                            ]
                            , null
                            , ['id'=>'tiempo_quirurgico','class' => 'form-control','style'=>'width: 100%']
                        )
                    !!}
                </div>

                <!-- Anestesia Sugerida Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
                    {!! Form::text('anestesia_sugerida', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
                </div>


                <div class="form-group col-sm-12">
                    <div class="card  card-secondary">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Mamrcar todos como si -->
                            <div class="col-sm-12">
                                {!! Form::label('toso_si', 'Marcar todos como sí:') !!}<br>

                                <input type="checkbox"  data-toggle="toggle"
                                       data-size="normal" data-on="Si" data-off="No"
                                       data-style="ios" name="todos_si" id="todos_si"
                                       value="1">

                            </div>

                            <!-- Aislamiento Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="aislamiento" value="0">
                                {!! Form::label('aislamiento', 'Aislamiento:') !!}<br>

                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="aislamiento" id="aislamiento"
                                       value="1"
                                    {{ ($parte->aislamiento ?? old('aislamiento') ?? false) ? 'checked' : '' }}>

                            </div>


                            <!-- Alergia Latex Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="alergia_latex" value="0">
                                {!! Form::label('alergia_latex', 'Alergia Latex:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="alergia_latex" id="alergia_latex"
                                       value="1"
                                    {{ ($parte->alergia_latex ?? old('alergia_latex') ?? false) ? 'checked' : '' }}>

                            </div>


                            <!-- Usuario Taco Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="usuario_taco" value="0">
                                {!! Form::label('usuario_taco', 'Usuario Taco:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="usuario_taco" id="usuario_taco"
                                       value="1"
                                    {{ ($parte->usuario_taco ?? old('usuario_taco') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Nececidad Cama Upc Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="nececidad_cama_upc" value="0">
                                {!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="nececidad_cama_upc" id="nececidad_cama_upc"
                                       value="1"
                                    {{ ($parte->nececidad_cama_upc ?? old('nececidad_cama_upc') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Prioridad Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="prioridad" value="0">
                                {!! Form::label('prioridad', 'Prioridad:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="prioridad" id="prioridad"
                                       value="1"
                                    {{ ($parte->prioridad ?? old('prioridad') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Necesita Donante Sangre Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="necesita_donante_sangre" value="0">
                                {!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="necesita_donante_sangre" id="necesita_donante_sangre"
                                       value="1"
                                    {{ ($parte->necesita_donante_sangre ?? old('necesita_donante_sangre') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Evaluacion Preanestesica Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="evaluacion_preanestesica" value="0">
                                {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="evaluacion_preanestesica" id="evaluacion_preanestesica"
                                       value="1"
                                    {{ ($parte->evaluacion_preanestesica ?? old('evaluacion_preanestesica') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Equipo Rayos Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="equipo_rayos" value="0">
                                {!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="equipo_rayos" id="equipo_rayos"
                                       value="1"
                                    {{ ($parte->equipo_rayos ?? old('equipo_rayos') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Insumos Especificos Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="insumos_especificos" value="0">
                                {!! Form::label('insumos_especificos', 'Insumos Especificos:') !!}<br>
                                <br>
                                <select class="form-control">

                                    @foreach(App\Models\Insumoespecifico::get() as $insumoespecifico)

                                        <option value="{{ $insumoespecifico->id }}" >
                                            {{ $insumoespecifico->nombre }}
                                        </option>

                                    @endforeach

                                </select>
                                <input type="hidden" name="insumoespecifico" :value="insumoespecifico">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
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
                    {!! Form::label('biopsia', 'Biopsias:') !!}
                    <!-- Clasificacion Id Field -->
                    <multiselect v-model="biopsia" :options="biopsias"  placeholder="Seleccione uno...">
                    </multiselect>
                    <input type="hidden" name="biopsia" :value="biopsia">
                </div>

                <!-- Instrumental Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('instrumental', 'Instrumental:') !!}
                    {!! Form::textarea('instrumental', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>




            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@push('scripts')
<script>

    $(function () {
        $("#todos_si").change(function (){
            if ($(this).prop('checked')){
                $(".cambiar_todos").bootstrapToggle('on')
            }else {
                $(".cambiar_todos").bootstrapToggle('off')
            }
        });


        function validaTodosSi(){
            var elementosNoCehcked = 0;

            $(".cambiar_todos").each(function (element){
                if ($(this).prop('checked')===false){
                    elementosNoCehcked ++;
                };
            })

            //si hay un elemento no checkeado
            if (elementosNoCehcked>0){
                $("#todos_si").bootstrapToggle('off')
            }else {
                $("#todos_si").bootstrapToggle('on')
            }
        }

        // validaTodosSi();


    })



    new Vue({
        el: '#fieldsPartes',
        name: 'fieldsPartes',
        created() {

        },
        data: {
            cirugia_tipo: @json($parte->cirugiaTipo ?? CirugiaTipo::find(old('cirugia_tipo_id')) ?? null),

            especialidad: @json($parte->especialidad ?? Especialidad::find(old('especialidad_id')) ?? null),

            diagnostico: @json($parte->diagnostico ?? Diagnostico::find(old('diagnostico_id')) ?? null),

            intervencion: @json($parte->intervencion ?? Intervencion::find(old('intervencion_id')) ?? null),

            clasificacion: @json($parte->clasificacion ?? Clasificacion::find(old('clasificacion_id')) ?? null),
            clasificaciones: @json($parte->cirugiaTipo->clasificaciones ?? []),

            preoperatorio: @json($parte->preoperatorio ?? Preoperatorio::find(old('preoperatorio_id')) ?? null),

            biopsia : @json($parte->biopsia ?? old('biopcias') ?? null),

            biopsias : [
                'Externa',
                'Rápida',
                'Diferida',
                'Citometría de flujo',
                'No aplica',
            ]
        },
        methods: {

        },
        watch: {
            cirugia_tipo (tipo) {
                if (tipo){
                    this.clasificaciones =tipo.clasificaciones
                }else{
                    this.clasificaciones = [];
                }
            }
        },
        computed:{
            esCirugiaMayor(){

                if (this.cirugia_tipo){
                    if (this.cirugia_tipo.id=='{{\App\Models\CirugiaTipo::MAYOR}}'){
                      return true;
                    }
                }

                $("#cma").bootstrapToggle('off')
                return false;
            }
        }
    });
</script>
@endpush
