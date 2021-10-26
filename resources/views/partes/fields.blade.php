
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
        <div class="card-body" >
            <div class="form-row" id="fieldsPartes">


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
                <div class="form-group col-sm-12 col-lg-12">
                    <div class="card " >
                        <div class="card-header py-0 px-1">
                            <h3 class="card-title">Intervenciones</h3>

                            <div class="card-tools">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body p-0">

                            <div class="row">

                                <div class="col-12 p-3">

                                    <div class="form-row">


                                        <div class="form-group col-sm-6">
                                            <select-intervencion
                                                :items="intervenciones"
                                                label="Intervencion"
                                                v-model="intervencion">

                                            </select-intervencion>
                                        </div>

                                        <div class="form-group col-sm-6" >


                                            <label for="vol">Lateralidad:</label>
                                            <input class="form-control" type="text" @keypress.prevent.enter="saveIntervencion()" v-model="editedItem.lateralidad"
                                            style="padding:20px;">
                                        </div>


                                        <div class="form-group col-sm-2">
                                            <label for="peep">&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-success" @click.prevent="saveIntervencion()">
                                                    <i class="fa fa-save" v-show="!loading"></i>
                                                    <i class="fa fa-sync fa-spin" v-show="loading"></i>
                                                    <span v-text="textButtonSubmint"></span>
                                                </button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive mb-0">
                                <table class="table table-bordered table-sm table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>intervencion</th>
                                        <th>Lateralidad</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="parte_intervenciones.length == 0">
                                        <td colspan="10" class="text-center">Ningún Registro agregado</td>
                                    </tr>
                                    <tr v-for="det in parte_intervenciones">
                                        <td v-text="det.intervencion.nombre"></td>
                                        <td v-text="det.lateralidad"></td>
                                        <td  class="text-nowrap">
                                            <button type="button" @click="editIntervencion(det)" class="btn btn-sm btn-outline-info" v-tooltip="'Editar'"  >
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <button type="button" @click="deleteIntervencion(det)"  class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>

                <!-- Lateralidad Field -->
                <!-- <div class="form-group col-sm-4">
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
                </div> -->


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

                    <multiselect v-model="tiempo_quirurgico" :options="tiempos"  placeholder="Seleccione uno...">
                    </multiselect>
                    <input type="hidden" name="tiempo_quirurgico" :value="tiempo_quirurgico">

                </div>

                <!-- Anestesia Sugerida Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('anestesia_sugerida', 'Anestesia Sugerida:') !!}
                    {!! Form::text('anestesia_sugerida', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
                </div>

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
             
                {!! Form::date('fecha_examenes', null, ['id' => 'fecha_examenes','class' => 'form-control','id'=>'fecha_examenes']) !!}
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
       
                {!! Form::date('fecha_preop_eu', null, ['id' => 'fecha_preop_eu','class' => 'form-control','id'=>'fecha_preop_eu']) !!}

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
                {!! Form::date('fecha_preop_medico', null, ['id' => 'fecha_preop_medico','class' => 'form-control','id'=>'fecha_preop_medico']) !!}

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
                {!! Form::date('fecha_preop_anestesista', null, ['id' => 'fecha_preop_anestesista','class' => 'form-control','id'=>'fecha_preop_anestesista']) !!}

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
                            <div class="form-group col-sm-4">
                                <select-insumo-especifico
                                    label="Insumo Especifico"
                                    v-model="insumo_especifico" >

                                </select-insumo-especifico>
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

                <!-- derivacion Field -->
                <div class="form-group col-sm-2">

                    <label for="">derivacion:</label>
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
                        label="Reparticion"
                        v-model="reparticion" >

                    </select-reparticion>
                </div>





            </div>

            <div class="form-row">
                <div class="form-group col-sm-12">
                    @include('partes.panel_contactos')
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
            this.getIntervenciones();
        },
        data: {
            cirugia_tipo: @json($parte->cirugiaTipo ?? CirugiaTipo::find(old('cirugia_tipo_id')) ?? null),

            insumo_especifico: @json($parte->insumoEspecifico ?? App\Models\Insumoespecifico::find(old('insumo_especifico_id')) ?? null),

            especialidad: @json($parte->especialidad ?? Especialidad::find(old('especialidad_id')) ?? null),

            diagnostico: @json($parte->diagnostico ?? Diagnostico::find(old('diagnostico_id')) ?? null),


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

            tiempo_quirurgico : @json($parte->tiempo_quirurgico ?? old('tiempo_quirurgico') ?? null),

            tiempos : [30, 60, 90, 120, 150, 180, 210, 240, 270, 300],

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


            extrademanda: @json($parte->extrademanda ?? null),
            derivacion: @json($parte->derivacion ?? null),
            examenes_realizados: @json($parte->examenes_realizados ?? null),
            control_preop_eu: @json($parte->control_preop_eu ?? null),
            control_preop_medico: @json($parte->control_preop_medico ?? null),
            control_preop_anestesista: @json($parte->control_preop_anestesista ?? null),

            convenio: @json($parte->convenio ?? null),
            reparticion: @json($parte->reparticion ?? null),
        },
        methods: {
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

                    console.log('data inter',data);

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

                console.log("Confirmacion",confirm);
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
            }
        }
    });
</script>
@endpush
