
<form id="formFiltersDatatables">

    <div class="form-row">



        <div class="form-group col-sm-2">
            {!! Form::label('del', 'Desde:') !!}
            {!! Form::date('del', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('al', 'Hasta:') !!}
            {!! Form::date('al', null, ['class' => 'form-control']) !!}
        </div>

        @unlessrole('Médico')
            <div class="form-group col-sm-4">
                {!! Form::label('del', 'Medico:') !!}
                <multiselect v-model="user" :options="users" label="name" placeholder="Seleccione uno...">
                </multiselect>
                <input type="hidden" name="users" :value="user ? user.id : null">
            </div>
        @endunlessrole

        <div class="form-group col-sm-3">
            {!! Form::label('del', 'Estado:') !!}
            <multiselect v-model="estado" :options="estados" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="estados" :value="estado ? estado.id : null">
        </div>

{{--        <div class="form-group col-sm-3">--}}
{{--            {!! Form::label('tiene_cancer', 'Tiene Cancer:') !!}--}}
{{--            <multiselect v-model="tiene_cancer" :options="select_tiene_cancer" label="nombre" placeholder="Seleccione uno...">--}}
{{--            </multiselect>--}}
{{--            <input type="hidden" name="tiene_cancer" :value="tiene_cancer ? tiene_cancer.id : null">--}}
{{--        </div>--}}

        <div class="form-group col-sm-3">
            <label for="">Tiene Cancer:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="tiene_cancer"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="tiene_cancer" :value="tiene_cancer ? 1 : 0">
            </div>
        </div>

        <div class="form-group col-sm-3">
            {!! Form::label('especialidad_id', 'Especialidades:') !!}
            <multiselect v-model="especialidad" :options="especialidades" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="especialidad_id" id="especialidad_id" :value="especialidadId">
        </div>

        <div class="form-group col-sm-3">
            <label for="">Exámenes Realizado:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="examen_realizado"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="examen_realizado" :value="examen_realizado ? 1 : 0">
            </div>
        </div>

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

        <div class="form-group col-sm-3">

            <label for="">Prioridad clínica:</label>
            <div class="text-lg">

                <toggle-button :sync="true"
                               :labels="{checked: 'Sí', unchecked: 'No'}"
                               v-model="prioridad"
                               :width="75"
                               :height="35"
                               :font-size="16"
                ></toggle-button>

                <input type="hidden" name="prioridad_clinica" :value="prioridad ? 1 : 0">
            </div>

        </div>

        <div class="form-group col-sm-3">
            {!! Form::label('grupo_base_id', 'Grupo Base:') !!}
            <multiselect v-model="grupobase" :options="grupobases" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="grupo_base_id" id="grupo_base_id" :value="grupoBaseId">
        </div>

        <div class="form-group col-sm-3">
            {!! Form::label('tipo_cirugia_id', 'Tipo Cirugía:') !!}
            <multiselect v-model="cirugiaTipo" :options="cirugiaTipos" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="tipo_cirugia_id" id="tipo_cirugia_id" :value="cirugiaTipoId">
        </div>

        <div class="form-group col-sm-2">
            <label for="">&nbsp;</label>
            <div>
                <button type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-sync"></i> Aplicar Filtros
                </button>
            </div>
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <a  href="{{route('partes.index')}}" type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-times"></i> Limpiar Filtros
                </a>
            </div>
        </div>
    </div>
</form>


@push('scripts')

    <script >

        $(function () {
            $('#formFiltersDatatables').submit(function(e){

                e.preventDefault();
                table = window.LaravelDataTables["dataTableBuilder"];

                table.draw();
            });
        })

        new Vue({
            el: '#formFiltersDatatables',
            name: 'fromFiltersPartes',
            created() {

                this.especialidadId;
                this.grupoBaseId;
                this.cirugiaTipoId;

            },
            data: {
                estados : @json($estados ?? []),
                estado: null,
                prioridad: false,
                prioridad_administrativa: false,

                users : @json(\App\Models\User::role([\App\Models\Role::MEDICO])->get() ?? []),
                user: null,

                examen_realizado: null,
                tiene_cancer: null,
                select_tiene_cancer: [
                    {
                        id: 1,
                        nombre: 'SI'
                    },
                    {
                        id: 2,
                        nombre: 'NO'
                    },
                ],

                especialidades: @json(\App\Models\Especialidad::with(['patologias'])->get() ?? []),
                especialidad: null,

                {{--grupobases: @json(\App\Models\GrupoBase::all() ?? []),--}}
                grupobases: [],
                grupobase: null,

                cirugiaTipos: @json(\App\Models\CirugiaTipo::all() ?? []),
                cirugiaTipo: null,

            },
            methods: {

            },
            computed:{
                especialidadId() {
                    if (this.especialidad) {
                        return this.especialidad.id;
                    }
                    return null;
                },
                grupoBaseId() {
                    if (this.grupobase) {
                        return this.grupobase.id;
                    }
                    return null;
                },
                cirugiaTipoId() {
                    if (this.cirugiaTipo) {
                        return this.cirugiaTipo.id;
                    }
                    return null;
                },
            },
            watch: {
                especialidad(val) {
                    if (val) {
                        if (val.patologias) {
                            this.grupobases = val.patologias;
                        } else {
                            this.grupobases = [];
                        }
                    } else {
                        this.grupobases = [];
                    }
                }
            }
        });
    </script>
@endpush
