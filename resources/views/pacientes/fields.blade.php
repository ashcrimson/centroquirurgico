<div class="form-row" id="paciente-fields">
    <div class="form-group col-md-6">
        <strong> <label class="text-red">Todos los campos con * son obligatorios</label> </strong>
    </div>

    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

    <!-- Run Field -->
    <div class="form-group col-sm-4">

        {!! Form::label('run', 'Run:') !!} <strong> <small class="text-danger">(Sin Puntos ni Dígito Verificador,Ej:15116302)</small> </strong>

        <div class="input-group ">

            {!! Form::number('run', null, ['id' => 'run','class' => 'form-control',
                             'onkeypress' => 'return event.charCode>=48 && event.charCode<=57 && this.value.length <= 7']) !!}
{{--            <input class="form-control" type="number" id="run" name="run" maxlength="8" ondrop="return false;"--}}
{{--                   onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57">--}}
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" @click="getDatosPaciente()">
                                    <span v-show="!loading">
                                        <i class="fa fa-search"></i>
                                    </span>
                    <span v-show="loading">
                                        <i class="fa fa-sync fa-spin"></i>
                                    </span>
                    Consultar
                </button>
            </div>
        </div>


    </div>

    <!-- Dv Run Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('dv_run', 'Dv Run:') !!} <span class="text-red">*</span>
        {!! Form::text('dv_run', null, ['id' => 'dv_run','class' => 'form-control','maxlength' => 1, 'readonly']) !!}
    </div>

    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

    <!-- Primer Nombre Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('primer_nombre', 'Primer Nombre:') !!} <span class="text-red">*</span>
        {!! Form::text('primer_nombre', null, ['id' => 'primer_nombre','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Segundo Nombre Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!} <span class="text-red">*</span>
        {!! Form::text('segundo_nombre', null, ['id' => 'segundo_nombre','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Apellido Paterno Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!} <span class="text-red">*</span>
        {!! Form::text('apellido_paterno', null, ['id' => 'apellido_paterno','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Apellido Materno Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('apellido_materno', 'Apellido Materno:') !!} <span class="text-red">*</span>
        {!! Form::text('apellido_materno', null, ['id' => 'apellido_materno','class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Fecha Nac Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('fecha_nac', 'Fecha Nac:') !!} <span class="text-red">*</span>
        {!! Form::date('fecha_nac', null, ['v-model' => 'fecha_nac','id' => 'fecha_nac','class' => 'form-control','id'=>'fecha_nac']) !!}
    </div>


    <div class="form-group col-sm-3">
        <label for="">Edad</label>
        <input type="text" class="form-control" readonly v-model="edad" value="0">
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('sexo', 'Sexo:') !!} <span class="text-red">*</span> <br>
        <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="M" data-off="F" data-style="ios" name="sexo" id="sexo"
               value="1"
            {{($rema->sexo ?? null)=="M" || ($paciente->sexo ?? $parte->paciente->sexo ?? null)=="M"  ? 'checked' : '' }}>
    </div>



    <!-- telefono Field -->
    <!-- <div class="form-group col-sm-3">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['id' => 'telefono','class' => 'form-control','maxlength' => 255]) !!}
    </div> -->

    <!-- Direccion Field -->
   <!--  <div class="form-group col-sm-12">
        {!! Form::label('direccion', 'Dirección:') !!}
        {!! Form::text('direccion', null, ['id' => 'direccion','class' => 'form-control','maxlength' => 255]) !!}
    </div> -->


    <!-- familiar_responsable Field -->
    <!-- <div class="form-group col-sm-12">
        {!! Form::label('familiar_responsable', 'Familiar Responsable:') !!}
        {!! Form::text('familiar_responsable', null, ['id' => 'familiar_responsable','class' => 'form-control','maxlength' => 255]) !!}
    </div>
 -->

</div>



@push('scripts')
<script>


    const vmPacienteFields = new Vue({
        el: '#paciente-fields',
        name: 'paciente-fields',
        created() {
            this.calcularEdad(this.fecha_nac);

            if (@json('fecha_nac')) {
                this.calcularEdad(this.fecha_nac);
            }
        },
        data: {
            loading : false,
            fecha_nac : @json($parte->fecha_nac ?? null),
            edad : 0,
        },
        methods: {
            async getDatosPaciente(){

                logI('FN: getDatosPaciente');

                this.loading = true;

                let run = $("#run").val();

                let url = "{{route('get.datos.paciente')}}"+"?run="+run;

                try{
                    let res = await axios.get(url);
                    let paciente = res.data.data;

                    //si existe la isntancia de vue vmPreparacionFields
                    if (typeof vmPreparacionFields  !== 'undefined') {
                        vmPreparacionFields.setDatosPreparacion(paciente.ultima_preparacion)
                    }

                    logI('respuesta',res);

                    if (!paciente){
                        alertWarning('Rut No Encontrado');
                    }else{
                        $("#dv_run").val(paciente.dv_run);
                        $("#apellido_paterno").val(paciente.apellido_paterno);
                        $("#apellido_materno").val(paciente.apellido_materno);
                        $("#primer_nombre").val(paciente.primer_nombre);
                        $("#segundo_nombre").val(paciente.segundo_nombre);
                        // $("#fecha_nac").val(paciente.fecha_nac);
                        this.fecha_nac = paciente.fecha_nac;

                        if (paciente.sexo=='M'){
                            $('#sexo').bootstrapToggle('on')
                        } else if (!paciente.sexo) {
                            $("#sexo").bootstrapToggle('off');
                        } else {
                            $("#sexo").bootstrapToggle('off');
                        }
                        $("#telefono").val(paciente.telefono);
                        $("#direccion").val(paciente.direccion);
                        $("#familiar_responsable").val(paciente.familiar_responsable);
                    }


                    this.loading = false;

                }catch (e) {
                    logW(e);
                    alertWarning('Rut No Encontrado');
                    this.loading = false;
                }
            },
            calcularEdad(fecha){
                if (fecha){
                    var years = moment().diff(fecha, 'years',false);
                    this.edad = years;
                }
            }
        },
        watch:{
            fecha_nac (fecha){
                if (fecha){
                    this.calcularEdad(fecha)
                }
            }
        }
    });
</script>
@endpush
