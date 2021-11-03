
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


                <!-- /.card-body -->
                <div class="form-group col-sm-12">
                    <panel-diagnosticos-parte parte_id="@json($parte->id)"></panel-diagnosticos-parte>
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

                                            {!! Form::label('lateralidad', 'Lateralidad:') !!}

                                            <multiselect v-model="editedItem.lateralidad" :options='["izquierda", "derecha", "bidireccional"]'  placeholder="Seleccione uno...">
                                            </multiselect>


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



                <div class="form-group col-sm-12">
                    <div class="card  card-secondary">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Mamrcar todos como si -->
                            <!-- <div class="col-sm-12">
                                {!! Form::label('toso_si', 'Marcar todos como sí:') !!}<br>

                                <input type="checkbox"  data-toggle="toggle"
                                       data-size="normal" data-on="Si" data-off="No"
                                       data-style="ios" name="todos_si" id="todos_si"
                                       value="1">

                            </div> -->

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

                            <!-- Segunco Ojo Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="segundo_ojo" value="0">
                                {!! Form::label('segundo_ojo', '2do Ojo:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="segundo_ojo" id="segundo_ojo"
                                       value="1"
                                    {{ ($parte->segundo_ojo ?? old('segundo_ojo') ?? false) ? 'checked' : '' }}>
                            </div>


                            <!-- Insumos Especificos Field -->
                            <div class="form-group col-sm-4">
                                <select-insumo-especifico
                                    label="Insumo Especifico"
                                    v-model="insumo_especifico" >

                                </select-insumo-especifico>
                            </div>

                            <!-- Nececidad Cama Upc Field -->
                            <div class="col-sm-3">
                                <input type="hidden" name="nececidad_cama_upc" value="0">
                                {!! Form::label('nececidad_cama_upc', 'Necesidad Cama Upc:') !!}<br>
                                <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="nececidad_cama_upc" id="nececidad_cama_upc"
                                       value="1"
                                    {{ ($parte->nececidad_cama_upc ?? old('nececidad_cama_upc') ?? false) ? 'checked' : '' }}>
                            </div>

                            <div class="col-sm-3" id="select_tipo_cama">
                                {!! Form::label('tipo_cama_upc', 'Tipo Cama UPC:') !!}<br>

                                <multiselect v-model="tipo_cama_upc" :options='["UCIGEN", "UCICAR", "UCIM"]'  placeholder="Seleccione uno...">
                                </multiselect>

                                <input type="hidden" name="tipo_cama_upc" :value="tipo_cama_upc">

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


                <!-- Grupo Base Field -->
                <!-- <div class="form-group col-sm-6">
                    <select-grupo-base
                        label="Grupo Base"
                        v-model="grupo_base" >

                    </select-grupo-base>
                </div> -->

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

                <!-- Instrumental Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('observaciones', 'Observaciones:') !!}
                    {!! Form::textarea('observaciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Segunco Ojo Field -->
                <div class="col-sm-6">
                    <input type="hidden" name="consentimiento" value="0">
                    <a href="http://acreditacion.hospitalnaval.cl/index.php?option=com_content&view=article&id=50&Itemid=72&dir=JSROOT%2FConsentimientos/">
                        <i class="fas fa-file" ></i></a>
                    {!! Form::label('consentimiento', 'Consentimiento informado, firmado y archivado en ficha clínica:') !!}
                    <br>

                    <input type="checkbox"  data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="consentimiento" id="consentimiento"
                            value="1"
                        {{ ($parte->consentimiento ?? old('consentimiento') ?? false) ? 'checked' : '' }}>
                </div>

                <!-- derivacion Field -->
                <!-- <div class="form-group col-sm-2">

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

                </div> -->

                <!-- <div class="form-group col-sm-4" v-show="derivacion">
                    <select-reparticion
                        label="Reparticion"
                        v-model="reparticion" >

                    </select-reparticion>
                </div> -->



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


            derivacion: @json($parte->derivacion ?? null),

            convenio: @json($parte->convenio ?? null),
            reparticion: @json($parte->reparticion ?? null),
            tipo_cama_upc: @json($parte->tipo_cama_upc ?? null),
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
