<!-- Medicamentos Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::label('name', 'Medicamentos:') !!} <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>

    {!!
        Form::select(
            'medicamentos[]',
            select(\App\Models\Medicamento::class,'nombre','id',null)
            , null
            , ['class' => 'form-control duallistbox','multiple']
        )
    !!}
</div> -->

<!-- /.card-body -->


<div id="fieldsAdmision">

    <div class="row" >


        <!-- extrademanda Field -->
        <div class="form-group col-sm-3">

            <label for="">Extrademanda:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="extrademanda"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="extrademanda" :value="extrademanda ? 1 : 0">
            </div>

        </div>

        <div class="form-group col-sm-3" v-show="extrademanda">
            <select-convenio
                label="Convenio"
                v-model="convenio" >

            </select-convenio>
        </div>

        <!-- Examenes Realizados Field -->
        <div class="form-group col-sm-3">

            <label for="">Exámenes Realizados:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="examenes_realizados"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="examenes_realizados" :value="examenes_realizados ? 1 : 0">
            </div>

        </div>


        <div class="form-group col-sm-3" v-show="examenes_realizados">
            {!! Form::label('fecha_examenes', 'Fecha examenes realizados') !!}

            {!! Form::date('fecha_examenes', fechaEn($parte->fecha_examenes), ['id' => 'fecha_examenes','class' => 'form-control','id'=>'fecha_examenes']) !!}
        </div>

    </div>
    <div class="row">
        <!-- Control preop eu Field -->
        <div class="form-group col-sm-3">

            <label for="">Control Preop EU:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="control_preop_eu"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="control_preop_eu" :value="control_preop_eu ? 1 : 0">
            </div>

        </div>



        <div class="form-group col-sm-3" v-show="control_preop_eu">
            {!! Form::label('fecha_preop_eu', 'Fecha PreOp EU') !!}

            {!! Form::date('fecha_preop_eu', fechaEn($parte->fecha_preop_eu), ['id' => 'fecha_preop_eu','class' => 'form-control','id'=>'fecha_preop_eu']) !!}

        </div>



        <!-- Control preop Medico Field -->
        <div class="form-group col-sm-3">

            <label for="">Control Preop Médico:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="control_preop_medico"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="control_preop_medico" :value="control_preop_medico ? 1 : 0">
            </div>

        </div>


        <div class="form-group col-sm-3" v-show="control_preop_medico">
            {!! Form::label('fecha_preop_medico', 'Fecha PreOp Médico') !!}
            {!! Form::date('fecha_preop_medico', fechaEn($parte->fecha_preop_medico), ['id' => 'fecha_preop_medico','class' => 'form-control','id'=>'fecha_preop_medico']) !!}

        </div>

    </div>
    <div class="row">
        <!-- Control preop Antestesista Field -->
        <div class="form-group col-sm-3">

            <label for="">Control Preop Anestesista:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="control_preop_anestesista"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="control_preop_anestesista" :value="control_preop_anestesista ? 1 : 0">
            </div>

        </div>

        <div class="form-group col-sm-3" v-show="control_preop_anestesista">
            {!! Form::label('fecha_preop_anestesista', 'Fecha PreOp Anestesista') !!}
            {!! Form::date('fecha_preop_anestesista', fechaEn($parte->fecha_preop_anestesista), ['id' => 'fecha_preop_anestesista','class' => 'form-control','id'=>'fecha_preop_anestesista']) !!}

        </div>


        <!-- Prioridad administrativa -->
        <div class="form-group col-sm-3">

            <label for="">Prioridad administrativa:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="prioridad_administrativa"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="prioridad_administrativa" :value="prioridad_administrativa ? 1 : 0">
            </div>

        </div>

        <div class="form-group col-sm-3" v-show="prioridad_administrativa">
            <label>Observación:</label>
            <textarea class="form-control" name="prioridad_admin_observacion" rows="2">{{ $parte->prioridad_admin_observacion }}</textarea>
        </div>

        <!-- Prioridad clínica -->
        <!-- <div class="form-group col-sm-3">

            <label for="">Prioridad clínica:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="prioridad_clinica"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="prioridad_clinica" :value="prioridad_clinica ? 1 : 0">
            </div>

        </div> -->

    </div>

    <div class="row">

        <!-- Banco Sangre -->
        <div class="form-group col-sm-3">
            <label for="">Banco Sangre:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="control_banco_sangre"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="control_banco_sangre" :value="control_banco_sangre ? 1 : 0">
            </div>
        </div>

        <div class="form-group col-sm-3" v-show="control_banco_sangre">
            {!! Form::label('fecha_banco_sangre', 'Fecha Banco Sangre') !!}
            {!! Form::date('fecha_banco_sangre', fechaEn($parte->fecha_banco_sangre), ['id' => 'fecha_banco_sangre','class' => 'form-control','id'=>'fecha_banco_sangre']) !!}

        </div>

    </div>

    <div class="row">
        <!-- Correo Electrónico -->
        <div class="form-group col-sm-3">
            {!! Form::label('email', 'Correo Electrónico:') !!}
            {!! Form::email('email', null, ['id' => 'email','class' => 'form-control']) !!}

        </div>

        <!-- Tiempo Quirurgico Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('user_ingresa', 'Cambio de Médico:') !!}
            <multiselect v-model="medico" :options="medicos" label="name"  placeholder="Seleccione uno...">
            </multiselect>
            <input v-if="medico" type="hidden" name="user_ingresa" :value="medico ? medico.id : null">
        </div>

        <!-- Sistema Salud Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('sistemasalud_id', 'Sistema Salud:') !!}
            <br>
            <multiselect v-model="sistema" :options="sistemas" label="nombre"  placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="sistema_salud_id" :value="sistema ? sistema.id : null">

        </div>

        <div class="form-group col-sm-3" v-show="mostrarCategoria">
            <label for="">Categoría</label>
            <br>
            <multiselect v-model="titular_carga" :options="['Sí mismo','Carga']"  placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="titular_carga" :value="titular_carga ? titular_carga : null">

        </div>

        <!-- Grupo Base Field -->
        <!-- <div class="form-group col-sm-3">
            <select-grupo-base
                label="Grupo Base"
                v-model="patologia"
                :items="patologias"
            >

            </select-grupo-base>

        </div> -->

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
                ></toggle-button>

                <input type="hidden" name="derivacion" :value="derivacion ? 1 : 0">
            </div>

        </div>

        <div class="form-group col-sm-4" v-show="derivacion">
            <select-reparticion
                label="Centro Derivador"
                v-model="reparticion" >

            </select-reparticion>
        </div>

        <div class="form-group col-sm-12">
            <panel-medicamentos-parte parte_id="@json($parte->id)"></panel-medicamentos-parte>
        </div>

        <div class="form-group col-sm-12">
            <panel-examens-parte parte_id="@json($parte->id)"></panel-examens-parte>
        </div>

        <input type="hidden" name="vieneDeListaEspera" value="{{ $vieneDeListaEspera }}">

    </div>

</div>

<div class="form-row">
    <div class="form-group col-sm-12">
        @include('partes.panel_contactos')
    </div>
</div>

@push('scripts')
<script>
    new Vue({
        el: '#fieldsAdmision',
        name: 'fieldsAdmision',
        created() {

        },
        data: {
            medico : @json($parte->medicoCirujano ?? null),
            medicos: @json($especialidadUser->medicos ?? []),
            sistema : @json($parte->sistemaSalud ?? null),
            sistemas: @json(App\Models\SistemaSalud::get() ?? []),

            patologias: @json($parte->userIngresa->patologias ?? []),
            patologia: @json($parte->grupoBase ?? null),
            extrademanda: @json($parte->extrademanda ?? null),
            examenes_realizados: @json($parte->examenes_realizados ?? null),
            control_preop_eu: @json($parte->control_preop_eu ?? null),
            control_preop_medico: @json($parte->control_preop_medico ?? null),
            control_preop_anestesista: @json($parte->control_preop_anestesista ?? null),
            control_banco_sangre: @json($parte->control_banco_sangre ?? null),

            convenio: @json($parte->convenio ?? null),
            titular_carga: @json($parte->titular_carga ?? null),


            prioridad_administrativa: @json($parte->prioridad_administrativa ? true : false),

            derivacion: @json($parte->derivacion ?? null),
            reparticion: @json($parte->reparticion ?? null),


        },
        methods: {

        },
        computed: {
            mostrarCategoria() {
                if (this.sistema) {
                    return true;
                } else {
                    return false;
                }
            }
        },
        watch: {
            medico (medico) {
                this.patologia = null;
                console.log('cambio medico',medico)
                if (medico){
                    this.patologias = medico.patologias;
                }else {
                    this.patologias = [];
                }
            }
        }
    });
</script>
@endpush
