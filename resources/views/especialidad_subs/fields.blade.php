<div class="form-row col-md-12" id="fieldsEspecialidadSub">

    <!-- Especialidad Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('especialidad_id', 'Especialidad:') !!}
        <multiselect v-model="especialidad" :options="especialidades" label="nombre" placeholder="Seleccione uno..." >
        </multiselect>
        <input type="hidden" name="especialidad_id" :value="getId(especialidad)">
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 3000,'maxlength' => 3000,'maxlength' => 3000]) !!}
    </div>
</div>

@push('scripts')
    <script>
        new Vue({
            el: '#fieldsEspecialidadSub',
            name: 'fieldsEspecialidadSub',
            created() {

            },
            data: {
                especialidades: @json(\App\Models\Especialidad::all() ?? []),
                especialidad: @json(isset($especialidadSub) ? $especialidadSub->especialidad : null),
            },
            methods: {
                getId(item){
                    if(item)
                        return item.id;

                    return null
                },
            },
        });
    </script>
@endpush
