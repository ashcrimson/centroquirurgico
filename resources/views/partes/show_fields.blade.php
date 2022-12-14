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
                @include('pacientes.show_fields',['paciente' => $parte->paciente])
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
        <div class="card-body" >
            <div class="form-row" id="fieldsPartes">


                <!-- Cirugia Tipo Id Field -->
                <div class="form-group col-sm-4">
                    <select-cirugia-tipo
                        label="Tipo Cirugía"
                        v-model="cirugia_tipo"
                        :disabled="true"
                    >

                    </select-cirugia-tipo>
                </div>

                <div class="form-group col-sm-4">
                    <label>Médico</label>
                    <input class="form-control" type="text" value="{{ $parte->userIngresa ? $parte->userIngresa->name : '' }}" disabled>
                </div>

                <!-- Especialidad Id Field -->
                <div class="form-group col-sm-4">
                    <select-especialidad
                        label="Especialidad"
                        v-model="especialidad"
                        :disabled="true"
                    >

                    </select-especialidad>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('especialidad_id', 'Sub-Especialidad:') !!}
                    <multiselect v-model="subEspecialidad" :options="subEspecialidades" label="nombre" placeholder="Seleccione uno..." disabled >
                    </multiselect>
{{--                    <input type="hidden" name="sub_especialidad_id" :value="getSubEspecialidaId(subEspecialidad)">--}}
                </div>

                <!-- Cma Field -->
                <div class="form-group col-sm-4" title="Cirugia Mayor Ambulatorio" >
                    {!! Form::label('cma', 'Cma:') !!}
                    <span v-show="cirugia_tipo && !esCirugiaMayor " class="text-muted">No aplica par el tipo de cirugia</span>
                    <br>

                    @if(auth()->user()->esAdmin())
                        <input type="hidden" name="cma" value="0">
                        <input type="checkbox" data-toggle="toggle"
                               data-size="normal"
                               data-on="Si" data-off="No"
                               data-style="ios"
                               name="cma"
                               id="cma"
                               :disabled="!esCirugiaMayor"
                               value="1"
                            {{ ($parte->cma ?? old('cma') ?? false) ? 'checked' : '' }}>
                    @else
                        <input type="checkbox" disabled data-toggle="toggle"
                               data-size="normal"
                               data-on="Si" data-off="No"
                               data-style="ios"
                               name="cma"
                               id="cma"
                               :disabled="true"
                               value="1"
                            {{ ($parte->cma ?? old('cma') ?? false) ? 'checked' : '' }}>
                    @endif
                </div>


                <!-- /.card-body -->
                <div class="form-group col-sm-12">
                    <panel-diagnosticos-parte parte_id="@json($parte->id)" :disabled="true"></panel-diagnosticos-parte>
                </div>

                <!-- Otros Diagnosticos Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otros_diagnosticos', 'Otros Diagnosticos:') !!}
                    {!! Form::textarea('otros_diagnosticos', $parte->otros_diagnosticos ?? null, ['class' => 'form-control','rows' => 2,'disabled']) !!}
                </div>

                <div class="form-group col-sm-12">
                    <panel-insumo-parte parte_id="@json($parte->id)" :disabled="true"></panel-insumo-parte>
                </div>

                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otros_insumos', 'Otros Insumos:') !!}
                    {!! Form::textarea('otros_insumos', $parte->otros_insumos, ['class' => 'form-control','rows' => 2, 'disabled']) !!}
                </div>

                <!-- Intervencion Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    <div class="table-responsive mb-0">
                        <table class="table table-bordered table-sm table-striped mb-0">
                            <thead>
                            <tr>
                                <th>intervencion</th>
                                <th>Lateralidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-if="parte_intervenciones.length == 0">
                                <td colspan="10" class="text-center">Ningún Registro agregado</td>
                            </tr>
                            <tr v-for="det in parte_intervenciones">
                                <td>
                                    <span v-if="det.intervencion_new" v-text="det.intervencion_new.text"></span>
                                </td>
                                <td v-text="det.lateralidad"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <!-- Otras Intervenciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('otras_intervenciones', 'Otras Intervenciones:') !!}
                    {!! Form::textarea('otras_intervenciones', $parte->otras_intervenciones ?? null, ['class' => 'form-control','rows' => 2,'readonly']) !!}
                </div>




                <div class="form-group col-sm-4">
                {!! Form::label('clasificacion', 'Clasificación ASA:') !!}
                <!-- Clasificacion Id Field -->
                    <multiselect v-model="clasificacion" :options="clasificaciones" label="nombre" placeholder="Seleccione uno..." :disabled="true">
                    </multiselect>
                    <input type="hidden" name="clasificacion_id" :value="clasificacion ? clasificacion.id : null" disabled>
                </div>
                <!-- Tiempo Quirurgico Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}

                    <multiselect v-model="tiempo_quirurgico" :disabled="true" :options="tiempos"  placeholder="Seleccione uno...">
                    </multiselect>
                    <input type="hidden" name="tiempo_quirurgico" :value="tiempo_quirurgico" disabled>

                </div>

                <!-- Anestesia Sugerida Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
                    <!-- Clasificacion Id Field -->
                    <multiselect v-model="anestesia_sugerida" :options="anestesia_sugeridas"  placeholder="Seleccione uno..." :disabled="true">
                    </multiselect>
                    <input type="hidden" name="anestesia_sugerida" :value="anestesia_sugerida" disabled>
                </div>



                <div class="form-group col-sm-12">
                    <div class="card  card-secondary">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <!-- Aislamiento Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="aislamiento" value="0" disabled>
                                    {!! Form::label('aislamiento', 'Aislamiento:') !!}<br>

                                    @if(auth()->user()->esAdmin())
                                        <input type="hidden" name="aislamiento" value="0">
                                        <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal"
                                               data-on="Si" data-off="No" data-style="ios" name="aislamiento" id="aislamiento"
                                               value="1"
                                            {{ ($parte->aislamiento ?? old('aislamiento') ?? false) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal"
                                               data-on="Si" data-off="No" data-style="ios" name="aislamiento" id="aislamiento"
                                               value="1"
                                            {{ ($parte->aislamiento ?? old('aislamiento') ?? false) ? 'checked' : '' }}>
                                    @endif

                                </div>


                                <!-- Alergia Latex Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="alergia_latex" value="0" disabled>
                                    {!! Form::label('alergia_latex', 'Alergia Latex:') !!}<br>
                                    @if(auth()->user()->esAdmin())
                                        <input type="hidden" name="alergia_latex" value="0">
                                        <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal"
                                               data-on="Si" data-off="No" data-style="ios" name="alergia_latex" id="alergia_latex"
                                               value="1"
                                            {{ ($parte->alergia_latex ?? old('alergia_latex') ?? false) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="alergia_latex" id="alergia_latex"
                                               value="1"
                                            {{ ($parte->alergia_latex ?? old('alergia_latex') ?? false) ? 'checked' : '' }}>
                                    @endif

                                </div>

                                <div class="modal fade" id="modalValidacionCambiarAlergiaLatex" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cambiar Valor Alergia Latex</h4>
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-row col-sm-12">
                                                    <h3>Esta seguro de cambiar el valor?</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnNoCambiarLatex" class="btn btn-warning">NO</button>
                                                <button type="button" id="btnSiCambiarLatex" class="btn btn-danger">SI</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->


                                <!-- Usuario Taco Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="usuario_taco" value="0" disabled>
                                    {!! Form::label('usuario_taco', 'Usuario Taco:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="usuario_taco" id="usuario_taco"
                                           value="1"
                                        {{ ($parte->usuario_taco ?? old('usuario_taco') ?? false) ? 'checked' : '' }}>
                                </div>

                                <!-- Nececidad Cama Upc Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="nececidad_cama_upc" value="0" disabled>
                                    {!! Form::label('nececidad_cama_upc', 'Nececidad Cama Upc:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="nececidad_cama_upc" id="nececidad_cama_upc"
                                           value="1"
                                        {{ ($parte->nececidad_cama_upc ?? old('nececidad_cama_upc') ?? false) ? 'checked' : '' }}>
                                </div>

                                <div class="col-sm-3" id="select_tipo_cama">
                                    {!! Form::label('tipo_cama_upc', 'Tipo Cama:') !!}<br>

                                    <multiselect :disabled="true" v-model="tipo_cama_upc" :options='["UCIGEN", "UCICAR", "UCIM"]'  placeholder="Seleccione uno...">
                                    </multiselect>

                                    <input type="hidden" name="tipo_cama_upc" :value="tipo_cama_upc" disabled>

                                </div>


                                <!-- Prioridad Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="prioridad" value="0" disabled>
                                    {!! Form::label('prioridad', 'Prioridad:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="prioridad" id="prioridad"
                                           value="1"
                                        {{ ($parte->prioridad ?? old('prioridad') ?? false) ? 'checked' : '' }}>
                                </div>


                                <!-- Necesita Donante Sangre Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="necesita_donante_sangre" value="0" disabled>
                                    {!! Form::label('necesita_donante_sangre', 'Necesita Donante Sangre:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="necesita_donante_sangre" id="necesita_donante_sangre"
                                           value="1"
                                        {{ ($parte->necesita_donante_sangre ?? old('necesita_donante_sangre') ?? false) ? 'checked' : '' }}>
                                </div>


                                <!-- Evaluacion Preanestesica Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="evaluacion_preanestesica" value="0" disabled>
                                    {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="evaluacion_preanestesica" id="evaluacion_preanestesica"
                                           value="1"
                                        {{ ($parte->evaluacion_preanestesica ?? old('evaluacion_preanestesica') ?? false) ? 'checked' : '' }}>
                                </div>


                                <!-- Equipo Rayos Field -->
                                <div class="col-sm-3">
                                    <input type="hidden" name="equipo_rayos" value="0" disabled>
                                    {!! Form::label('equipo_rayos', 'Equipo Rayos:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="equipo_rayos" id="equipo_rayos"
                                           value="1"
                                        {{ ($parte->equipo_rayos ?? old('equipo_rayos') ?? false) ? 'checked' : '' }}>
                                </div>

                                <!-- Segunco Ojo Field -->
                                <div class="col-sm-3" v-show="mostrar2doOjo">
                                    <input type="hidden" name="segundo_ojo" value="0" disabled>
                                    {!! Form::label('segundo_ojo', '2do Ojo:') !!}<br>
                                    <input type="checkbox" disabled class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="segundo_ojo" id="segundo_ojo"
                                           value="1"
                                        {{ ($parte->segundo_ojo ?? old('segundo_ojo') ?? false) ? 'checked' : '' }}>
                                </div>

                                <div class="col-sm-3">
                                    {!! Form::label('cancer', 'Cáncer o Sospecha de Cáncer:') !!}<br>
                                    <multiselect v-model="cancerOptionSelect" :options='cancerOptions' label="nombre" placeholder="Seleccione uno..."
                                                 ref="multiselectCancerSospechaCancer" disabled>
                                    </multiselect>
                                    <input type="hidden" name="cancer" :value="cancerOptionSelectVal" disabled>
                                </div>

                                <div class="col-sm-3">
                                    {!! Form::label('evaluacion_especialidad', 'Interconsulta Pre-QX:') !!}<br>
                                    <multiselect v-model="evaluacionEspecialidadSelect" :options='evaluacionEspecialidadOptions' v-model="evaluacionEspecialidadSelect" label="nombre" placeholder="Seleccione uno..." disabled >
                                    </multiselect>
                                    <input type="hidden" name="evaluacion_especialidad" :value="evaluacionEspecialidadSelectVal" disabled>
                                </div>

                                <div class="col-sm-4" id="div_indique_especialidad">
                                    {!! Form::label('indique_especialidad', 'Indique Especialidad:') !!}<br>
                                    <textarea class="form-control" cols="2" rows="2" name="indique_especialidad" id="indique_especialidad" disabled>{{ $parte->indique_especialidad ?? null }}</textarea>
                                </div>


                                <!-- Insumos Especificos Field -->
{{--                                <div class="form-group col-sm-4">--}}
{{--                                    <select-insumo-especifico--}}
{{--                                        label="Insumo Especifico"--}}
{{--                                        v-model="insumo_especifico"--}}
{{--                                        :disabled="true"--}}
{{--                                    >--}}

{{--                                    </select-insumo-especifico>--}}
{{--                                </div>--}}

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- Preoperatorio Id Field -->
                <div class="form-group col-sm-6">
                    <select-preoperatorio
                        label="Ex Preoperatorios"
                        v-model="preoperatorio"
                        :disabled="true">

                    </select-preoperatorio>
                </div>

                <!-- Grupo Base Field -->
                <div class="form-group col-sm-6">
                    <select-grupo-base
                        label="Grupo Base"
                        v-model="grupo_base"
                        :disabled="true">

                    </select-grupo-base>
                </div>

                <!-- Biopsia Field -->
                <div class="form-group col-sm-6">
                {!! Form::label('biopsia', 'Biopsias:') !!}
                <!-- Clasificacion Id Field -->
                    <multiselect v-model="biopsia" :options="biopsias"  placeholder="Seleccione uno..." :disabled="true">
                    </multiselect>
                    <input type="hidden" name="biopsia" :value="biopsia" disabled>
                </div>

                <!-- Instrumental Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('instrumental', 'Equipo o Instrumental:') !!}
                    {!! Form::textarea('instrumental', $parte->instrumental ?? '', ['class' => 'form-control','rows' => 2,'disabled']) !!}
                </div>

                <!-- Instrumental Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('observaciones', 'Observaciones:') !!}
                    {!! Form::textarea('observaciones', $parte->observaciones, ['class' => 'form-control','rows' => 2,'disabled']) !!}
                </div>

                <!-- Segunco Ojo Field -->
                <div class="col-sm-6">
{{--                    <input type="hidden" name="consentimiento" value="0">--}}

                    <label for="">
{{--                        <a href="http://acreditacion.hospitalnaval.cl/index.php?option=com_content&view=article&id=50&Itemid=72&dir=JSROOT%2FConsentimientos/">--}}
{{--                            <i class="fas fa-file" ></i></a>--}}
                        Consentimiento informado, firmado y archivado en ficha clínica:
                    </label>
                    <br>

                    <input type="checkbox" disabled  data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios"
                        {{ ($parte->consentimiento ?? old('consentimiento') ?? false) ? 'checked' : '' }}>
                </div>

                @if(auth()->user()->hasRole(\App\Models\Role::ADMISION) && routeIs('partes.show'))

                    <!-- Correo Electrónico -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('email', 'Correo Electrónico:') !!}
                        {!! Form::email('email', $parte->email, ['id' => 'email','class' => 'form-control','disabled']) !!}

                    </div>

                    <!-- Tiempo Quirurgico Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('user_ingresa', 'Cambio de Médico:') !!}
                        <multiselect v-model="medico" :options="medicos" label="name"  placeholder="Seleccione uno..."
                                     disabled>
                        </multiselect>
                        <input v-if="medico" type="hidden" name="user_ingresa" :value="medico ? medico.id : null" disabled>
                    </div>

                    <!-- Sistema Salud Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('sistemasalud_id', 'Sistema Salud:') !!}
                        <br>
                        <multiselect v-model="sistema" :options="sistemas" label="nombre"  placeholder="Seleccione uno..."
                                     disabled>
                        </multiselect>
                        <input type="hidden" name="sistemasalud_id" :value="sistema ? sistema.id : null" disabled>

                    </div>

                    <div class="form-group col-sm-3" v-show="mostrarCategoria">
                        <label for="">Categoría</label>
                        <br>
                        <multiselect v-model="titular_carga" :options="['Sí mismo','Carga']"  placeholder="Seleccione uno..."
                                     disabled>
                        </multiselect>
                        <input type="hidden" name="titular_carga" :value="titular_carga ? titular_carga : null" disabled>

                    </div>

                    <!-- derivacion Field -->
                    <div class="form-group col-sm-2">

                        <label for="">derivación:</label>
                        <div class="text-lg">

                            <toggle-button :sync="true"
                                           :labels="{checked: 'Sí', unchecked: 'No'}"
                                           v-model="derivacion"
                                           :width="75"
                                           :height="35"
                                           :font-size="16"
                                           disabled
                            ></toggle-button>

                            <input type="hidden" name="derivacion" :value="derivacion ? 1 : 0" disabled>
                        </div>

                    </div>

                    <div class="form-group col-sm-4" v-show="derivacion">
                        <select-reparticion
                            label="Centro Derivador"
                            v-model="reparticion"
                            :disabled="true">

                        </select-reparticion>
                    </div>

                    <div class="form-group col-sm-12">
                        <panel-medicamentos-parte parte_id="@json($parte->id)" :disabled="true"></panel-medicamentos-parte>
                    </div>

                    <div class="form-group col-sm-12">
                        <panel-examens-parte parte_id="@json($parte->id)" :disabled="true"></panel-examens-parte>
                    </div>

                @endif

            </div>

            @if(auth()->user()->hasRole(\App\Models\Role::ADMISION) && routeIs('partes.show'))

                <div class="form-group col-sm-12">
                    @include('partes.panel_contactos_show')
                </div>

            @endif

        </div>
    </div>

</div>


@push('scripts')
    <script>

        $(function () {

            $("#select_tipo_cama").hide();

            $("#nececidad_cama_upc").change(function (){
                validadNececidadCama();
            });

            function validadNececidadCama(){
                if ($("#nececidad_cama_upc").prop('checked')){
                    $("#select_tipo_cama").show()
                }else {
                    $("#select_tipo_cama").hide()
                }
            }

            validadNececidadCama();


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

            $( "#alergia_latex" ).change(function() {
                $( "#modalValidacionCambiarAlergiaLatex" ).modal('show');
            });

            $("#btnNoCambiarLatex").click(function () {
                if ($( "#alergia_latex" ).val() == 1) {
                    $( "#alergia_latex" ).val(1);
                    $("#alergia_latex").bootstrapToggle('on')
                } else if ($( "#alergia_latex" ).val() == 0) {
                    $( "#alergia_latex" ).val(0);
                    $("#alergia_latex").bootstrapToggle('off')
                }
                $( "#modalValidacionCambiarAlergiaLatex" ).modal('hide');
            });

            $("#btnSiCambiarLatex").click(function () {
                if ($( "#alergia_latex" ).val() == 1) {
                    $( "#alergia_latex" ).val(0);
                    $("#alergia_latex").bootstrapToggle('off')
                } else if ($( "#alergia_latex" ).val() == 0) {
                    $( "#alergia_latex" ).val(1);
                    $("#alergia_latex").bootstrapToggle('on')
                }
                $( "#modalValidacionCambiarAlergiaLatex" ).modal('hide');
            });

        })



        new Vue({
            el: '#fieldsPartes',
            name: 'fieldsPartes',
            created() {
                this.getIntervenciones();

                this.cancerOptionSelectVal;
                this.evaluacionEspecialidadSelectVal;

                if (@json($parte->cancer) == 1) {
                    this.cancerOptionSelect = this.cancerOptions[0];
                } else if (@json($parte->cancer) == 2) {
                    this.cancerOptionSelect = this.cancerOptions[1];
                }

                if (@json($parte->evaluacion_especialidad) == 1) {
                    this.evaluacionEspecialidadSelect = this.evaluacionEspecialidadOptions[0];
                    $("#div_indique_especialidad").show()
                    $("#indique_especialidad").prop('required', true);
                } else if (@json($parte->evaluacion_especialidad) == 2) {
                    this.evaluacionEspecialidadSelect = this.evaluacionEspecialidadOptions[1];
                    $("#div_indique_especialidad").hide()
                    $("#indique_especialidad").prop('required', false);
                }
            },
            data: {
                cirugia_tipo: @json($parte->cirugiaTipo ?? CirugiaTipo::find(old('cirugia_tipo_id')) ?? null),

                insumo_especifico: @json($parte->insumoEspecifico ?? App\Models\Insumoespecifico::find(old('insumo_especifico_id')) ?? null),

                especialidad: @json($parte->especialidad ?? Especialidad::find(old('especialidad_id')) ?? null),

                grupo_base: @json($parte->grupoBase ?? App\Models\GrupoBase::find(old('grupo_base_id')) ?? null),

                clasificacion: @json($parte->clasificacion ?? Clasificacion::find(old('clasificacion_id')) ?? null),
                clasificaciones: @json($parte->cirugiaTipo->clasificaciones ?? []),

                preoperatorio: @json($parte->preoperatorio ?? Preoperatorio::find(old('preoperatorio_id')) ?? null),

                biopsia : @json($parte->biopsia ?? old('biopsia') ?? null),

                biopsias : [
                    'Externa',
                    'Rápida',
                    'Diferida',
                    'Citometría de flujo',
                    'No aplica',
                ],

                anestesia_sugerida : @json($parte->anestesia_sugerida ?? old('anestesia_sugerida') ?? null),

                anestesia_sugeridas : [
                    'Cuidados anestésicos monitorizados',
                    'Anestesia local por cirujano',
                    'Sedación',
                    'Bloqueo de nervio periférico (plexo)',
                    'Anestesia Neuroaxial (Espinal, Epidural)',
                    'Anestesia General',
                    'Anestesia General + CEC'
                ],

                tiempo_quirurgico : @json($parte->tiempo_quirurgico ?? old('tiempo_quirurgico') ?? null),

                tiempos : [30, 60, 90, 120, 150, 180, 210, 240, 270, 300],

                lateralidad : @json(old('lateralidad') ?? null),

                lateralidad_opciones : ["izquierda", "derecha", "bidireccional"],

                intervenciones: @json(\App\Models\Intervencion::all() ?? []),
                intervencion: null,


                parte_intervenciones: [],
                editedItem: {
                    id : 0,
                    parte_id: @json($parte->id),
                },
                defaultItem: {
                    id : 0,
                    parte_id: @json($parte->id),

                },
                itemElimina: {

                },

                loading: false,

                parte_id: @json($parte->id),

                convenio: @json($parte->convenio ?? null),
                tipo_cama_upc: @json($parte->tipo_cama_upc ?? null),

                cancerOptions: [
                    {
                        val: 1,
                        nombre: 'SI'
                    },
                    {
                        val: 2,
                        nombre: 'NO'
                    },
                ],
                cancerOptionSelect: null,
                evaluacionEspecialidadOptions: [
                    {
                        val: 1,
                        nombre: 'SI'
                    },
                    {
                        val: 2,
                        nombre: 'NO'
                    },
                ],
                evaluacionEspecialidadSelect: null,

                subEspecialidades: [],
                subEspecialidad: @json($parte->subEspecialidad ?? \App\Models\EspecialidadSub::find(old('sub_especialidad_id'))),

                alergia_latex: null,

                medico : @json($parte->userIngresa ?? null),
                medicos: @json(\App\Models\User::role('medico')->get()),

                sistema : @json($parte->sistemaSalud ?? null),
                sistemas: @json(App\Models\SistemaSalud::get() ?? []),

                titular_carga: @json($parte->titular_carga ?? null),

                derivacion: @json($parte->derivacion ?? null),

                reparticion: @json($parte->reparticion ?? null),
            },
            methods: {
                getSubEspecialidaId(item) {
                    if(item)
                        return item.id;

                    return null
                },
                close () {
                    this.loading = false;
                    setTimeout(() => {
                        this.intervencion = null;
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },
                getId(item){
                    if(item)
                        return item.id;

                    return null
                },
                editIntervencion (item) {
                    this.intervencion = Object.assign({}, item.intervencion);
                    this.editedItem = Object.assign({}, item);

                },
                async getIntervenciones() {
                    const res = await  axios.get(route('api.parte_intervenciones.index',{parte_id: this.parte_id}));
                    this.parte_intervenciones = res.data.data;
                },
                async saveIntervencion () {

                    this.loading = true;

                    try {

                        this.editedItem.intervencion_id = this.getId(this.intervencion)
                        const data = this.editedItem;

                        if(this.editedItem.id === 0){

                            var res = await axios.post(route('api.parte_intervenciones.store'),data);

                        }else {

                            var res = await axios.patch(route('api.parte_intervenciones.update',this.editedItem.id),data);

                        }

                        logI(res.data);

                        iziTs(res.data.message);
                        this.getIntervenciones();
                        this.close();

                    }catch (e) {
                        notifyErrorApi(e);
                        this.loading = false;
                    }

                },
                async deleteIntervencion(item) {

                    let confirm = await Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínalo\n!'
                    });

                    if (confirm.isConfirmed){
                        try{
                            let res = await  axios.delete(route('api.parte_intervenciones.destroy',item.id))
                            logI(res.data);

                            iziTs(res.data.message);
                            this.editIntervencion();


                        }catch (e){
                            notifyErrorApi(e);
                            this.itemElimina = {};
                        }

                    }

                }
            },
            watch: {
                cirugia_tipo (tipo) {
                    if (tipo){
                        this.clasificaciones =tipo.clasificaciones
                    }else{
                        this.clasificaciones = [];
                    }
                },
                evaluacionEspecialidadSelect(val) {
                    if (val) {
                        if (val.val == 1) {
                            $("#div_indique_especialidad").show()
                            $("#indique_especialidad").prop('required', true);
                        } else if (val.val == 2) {
                            $("#div_indique_especialidad").hide()
                            $("#indique_especialidad").prop('required', false);
                        }
                    } else {
                        $("#div_indique_especialidad").hide()
                        $("#indique_especialidad").prop('required', false);
                    }
                },
                alergia_latex(val) {
                    if (val) {

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
                },
                textButtonSubmint () {
                    if (this.loading){
                        return this.editedItem.id === 0 ? 'Agregando...' : 'Actualizando...'

                    }else {
                        return this.editedItem.id === 0 ? 'Agregar' : 'Actualizar'

                    }
                },
                cancerOptionSelectVal() {
                    if (this.cancerOptionSelect) {
                        return this.cancerOptionSelect.val;
                    }
                    return null;
                },
                evaluacionEspecialidadSelectVal() {
                    if (this.evaluacionEspecialidadSelect) {
                        return this.evaluacionEspecialidadSelect.val;
                    }
                    return null;
                },
                mostrar2doOjo() {
                    if (this.especialidad) {
                        if (this.especialidad.id == 11) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                },
                mostrarCategoria() {
                    if (this.sistema) {
                        return true;
                    } else {
                        return false;
                    }
                },
            }
        });
    </script>
@endpush
