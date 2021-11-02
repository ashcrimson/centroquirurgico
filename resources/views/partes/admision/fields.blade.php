<!-- Medicamentos Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Medicamentos:') !!} <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>

    {!!
        Form::select(
            'medicamentos[]',
            select(\App\Models\Medicamento::class,'nombre','id',null)
            , null
            , ['class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>


<div id="fieldsAdmision">

    <div class="row" >


        <!-- extrademanda Field -->
        <div class="form-group col-sm-2">

            <label for="">extrademanda:</label>
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

        <div class="form-group col-sm-4" v-show="extrademanda">
            <select-convenio
                label="Convenio"
                v-model="convenio" >

            </select-convenio>
        </div>

        <!-- Examenes Realizados Field -->
        <div class="form-group col-sm-2">

            <label for="">Examenes Realizados:</label>
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

        <div class="form-group col-sm-4" v-show="examenes_realizados">
            {!! Form::label('fecha_examenes', 'Fecha examenes realizados') !!}

            {!! Form::date('fecha_examenes', fechaEn($parte->fecha_examenes), ['id' => 'fecha_examenes','class' => 'form-control','id'=>'fecha_examenes']) !!}
        </div>

        <div class="form-row">
                <div class="form-group col-sm-12">
                    @include('partes.panel_contactos')
                </div>
            </div>

        <!-- Control preop eu Field -->
        <div class="form-group col-sm-2">

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

        

        <div class="form-group col-sm-4" v-show="control_preop_eu">
            {!! Form::label('fecha_preop_eu', 'Fecha PreOp EU') !!}

            {!! Form::date('fecha_preop_eu', fechaEn($parte->fecha_preop_eu), ['id' => 'fecha_preop_eu','class' => 'form-control','id'=>'fecha_preop_eu']) !!}

        </div>

        

        <!-- Control preop Medico Field -->
        <div class="form-group col-sm-2">
 
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

        

        <div class="form-group col-sm-4" v-show="control_preop_medico">
            {!! Form::label('fecha_preop_medico', 'Fecha PreOp Médico') !!}
            {!! Form::date('fecha_preop_medico', fechaEn($parte->fecha_preop_medico), ['id' => 'fecha_preop_medico','class' => 'form-control','id'=>'fecha_preop_medico']) !!}

        </div>

        

        <!-- Control preop Antestesista Field -->
        <div class="form-group col-sm-2">

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

        <div class="form-group col-sm-4" v-show="control_preop_anestesista">
            {!! Form::label('fecha_preop_anestesista', 'Fecha PreOp Anestesista') !!}
            {!! Form::date('fecha_preop_anestesista', fechaEn($parte->fecha_preop_anestesista), ['id' => 'fecha_preop_anestesista','class' => 'form-control','id'=>'fecha_preop_anestesista']) !!}

        </div>
    </div>
    <div class="row">
        <!-- Correo Electrónico -->
        <div class="form-group col-sm-4">
            {!! Form::label('email', 'Correo Electrónico:') !!}
            {!! Form::email('email', null, ['id' => 'email','class' => 'form-control']) !!}

        </div>

        

        <!-- Tiempo Quirurgico Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('user_ingresa', 'Cambio de Medico:') !!}
            <multiselect v-model="medico" :options="medicos" label="name"  placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="user_ingresa" :value="medico ? medico.id : null">
        </div>

        


        <!-- Sistema Salud Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('sistemasalud_id', 'Sistema Salud:') !!}
            <br>
            <select class="form-control" name="sistemasalud_id">

                @foreach(App\Models\SistemaSalud::get() as $sistemasalud)

                    <option value="{{ $sistemasalud->id }}" >
                        {{ $sistemasalud->nombre }}
                    </option>

                @endforeach

            </select>

        </div>

        

        <!-- Grupo Base Field -->
        <div class="form-group col-sm-4">
            <select-grupo-base
                label="Grupo Base"
                v-model="grupo_base" >

            </select-grupo-base>

        </div>

        

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
            medico : @json($parte->userIngresa ?? null),
            medicos: @json(\App\Models\User::role('medico')->get()),

            grupo_base: @json($parte->grupoBase ?? null),
            extrademanda: @json($parte->extrademanda ?? null),
            examenes_realizados: @json($parte->examenes_realizados ?? null),
            control_preop_eu: @json($parte->control_preop_eu ?? null),
            control_preop_medico: @json($parte->control_preop_medico ?? null),
            control_preop_anestesista: @json($parte->control_preop_anestesista ?? null),

            convenio: @json($parte->convenio ?? null),
            reparticion: @json($parte->reparticion ?? null),

        },
        methods: {

        }
    });
</script>
@endpush
