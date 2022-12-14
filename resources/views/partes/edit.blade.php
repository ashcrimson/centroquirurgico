@extends('layouts.app')

@section('title_page',__('Edit Parte'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>
                        @if($parte->esTemporal())
                            {{__('Nuevo Parte')}}
                        @else
                            {{__('Editar Parte')}}
                        @endif
                    </h1>
                </div>
                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('partes.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('Listado')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">


            @include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">

                   {!! Form::model($parte, ['route' => ['partes.update', $parte->id], 'method' => 'patch','class' => '', 'id' => 'guardarEnviarFormEdit']) !!}
                        <div class="form-row">

                            @include('partes.fields')

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12 text-right">
                                <a href="{!! route('partes.index') !!}" class="btn btn-outline-secondary">
                                    Cancelar
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fa fa-floppy-o"></i> Guardar
                                </button>


                                @if($parte->puedeEnviarAdmision())
                                <button type="button" onclick="confirmarGuardarEnviar()" class="btn btn-outline-primary ml-3">
                                    <i class="fa fa-paper-plane"></i> Guardar y Enviar
                                </button>
                                @endif
                            </div>
                        </div>

                        <div class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelTitleId">
                                        Guardar y Enviar a Admisi??n
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        ??Est??s seguro de guardar y enviar a Admisi??n?
                                        <br>
                                        Indique al paciente que se dirija a admisi??n.
                                        <br>
                                        Horarios Atenci??n: Lunes a Viernes desde 7:45 a 17:00 hrs.
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cerrar
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="guardarEnviar()" name="enviar_admin" id="enviar_admin" value="1">
                                        Guardar Y Enviar Admisi??n
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                   {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>

        function confirmarGuardarEnviar() {
            $('#modalForm').modal('show');
        }

        function guardarEnviar() {
            Swal.fire({
                title: 'Espera por favor...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timerProgressBar: true,
            });

            Swal.showLoading();

            if (!$("input[name='cirugia_tipo_id']").val()) {

                // fieldsPartes.$refs.selectTipoCirugia.$refs.multiselect.$el.focus();
                let multiselectTipoCirugia = fieldsPartes.$refs.selectTipoCirugia.$refs.multiselect.$el;
                multiselectTipoCirugia.classList.add('error-multi-select');
                multiselectTipoCirugia.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Tipo Cirug??a es requerido!');
                return false;
            } else {
                let multiselectTipoCirugia = fieldsPartes.$refs.selectTipoCirugia.$refs.multiselect.$el;
                multiselectTipoCirugia.classList.remove('error-multi-select');
            }

            if (!$("input[name='especialidad_id']").val()) {

                let multiselectEspecialidad = fieldsPartes.$refs.selectEspecialidad.$refs.multiselect.$el;
                multiselectEspecialidad.classList.add('error-multi-select');
                multiselectEspecialidad.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Especialidad es requerido!');
                return false;
            } else {
                let multiselectEspecialidad = fieldsPartes.$refs.selectEspecialidad.$refs.multiselect.$el;
                multiselectEspecialidad.classList.remove('error-multi-select');
            }

            if (!$("input[name='tiempo_quirurgico']").val()) {

                let multiselectTiempoQuirurgico = fieldsPartes.$refs.multiselectTiempoQuirurgico.$el;
                multiselectTiempoQuirurgico.classList.add('error-multi-select');
                multiselectTiempoQuirurgico.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Tiempo Quir??rgico es requerido!');
                return false;
            } else {
                let multiselectTiempoQuirurgico = fieldsPartes.$refs.multiselectTiempoQuirurgico.$el;
                multiselectTiempoQuirurgico.classList.remove('error-multi-select');
            }

            if (!$("input[name='clasificacion_id']").val()) {

                let multiselectClasificacionAsa = fieldsPartes.$refs.multiselectClasificacionAsa.$el;
                multiselectClasificacionAsa.classList.add('error-multi-select');
                multiselectClasificacionAsa.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Clasificaci??n ASA es requerido!');
                return false;
            } else {
                let multiselectClasificacionAsa = fieldsPartes.$refs.multiselectClasificacionAsa.$el;
                multiselectClasificacionAsa.classList.remove('error-multi-select');
            }

            if (!$("input[name='anestesia_sugerida']").val()) {

                let multiselectAnestesiaSugerida = fieldsPartes.$refs.multiselectAnestesiaSugerida.$el;
                multiselectAnestesiaSugerida.classList.add('error-multi-select');
                multiselectAnestesiaSugerida.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Anestesia Sugerida es requerido!');
                return false;
            } else {
                let multiselectAnestesiaSugerida = fieldsPartes.$refs.multiselectAnestesiaSugerida.$el;
                multiselectAnestesiaSugerida.classList.remove('error-multi-select');
            }

            if ($('input[name=nececidad_cama_upc]:checked').length == 1) {
                if (!$("input[name='tipo_cama_upc']").val()) {

                    let multiselectTipoCamaUpc = fieldsPartes.$refs.multiselectTipoCamaUpc.$el;
                    multiselectTipoCamaUpc.classList.add('error-multi-select');
                    multiselectTipoCamaUpc.scrollIntoView();

                    $('#modalForm').modal('hide');
                    Swal.close('true');
                    iziTe('El Campo Tipo Cama UPC es requerido!');
                    return false;
                } else {
                    let multiselectTipoCamaUpc = fieldsPartes.$refs.multiselectTipoCamaUpc.$el;
                    multiselectTipoCamaUpc.classList.remove('error-multi-select');
                }
            }

            if (!$("input[name='cancer']").val()) {

                let multiselectCancerSospechaCancer = fieldsPartes.$refs.multiselectCancerSospechaCancer.$el;
                multiselectCancerSospechaCancer.classList.add('error-multi-select');
                multiselectCancerSospechaCancer.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo C??ncer o Sospecha de C??ncer es requerido!');
                return false;
            } else {
                let multiselectCancerSospechaCancer = fieldsPartes.$refs.multiselectCancerSospechaCancer.$el;
                multiselectCancerSospechaCancer.classList.remove('error-multi-select');
            }

            if (!$("input[name='preoperatorio_id']").val()) {

                let multiselectPreoperatorio = fieldsPartes.$refs.selectPreoperatorio.$refs.multiselect.$el;
                multiselectPreoperatorio.classList.add('error-multi-select');
                multiselectPreoperatorio.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Ex Preoperatorios es requerido!');
                return false;
            } else {
                let multiselectPreoperatorio = fieldsPartes.$refs.selectPreoperatorio.$refs.multiselect.$el;
                multiselectPreoperatorio.classList.remove('error-multi-select');
            }

            if (!$("input[name='grupo_base_id']").val()) {

                let multiselectGrupoBase = fieldsPartes.$refs.multiselectGrupoBase.$el;
                multiselectGrupoBase.classList.add('error-multi-select');
                multiselectGrupoBase.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Grupo Base es requerido!');
                return false;
            } else {
                let multiselectGrupoBase = fieldsPartes.$refs.multiselectGrupoBase.$el;
                multiselectGrupoBase.classList.remove('error-multi-select');
            }

            if (!$("input[name='biopsia']").val()) {

                let multiselectBiopsias = fieldsPartes.$refs.multiselectBiopsias.$el;
                multiselectBiopsias.classList.add('error-multi-select');
                multiselectBiopsias.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Biopsias es requerido!');
                return false;
            } else {
                let multiselectBiopsias = fieldsPartes.$refs.multiselectBiopsias.$el;
                multiselectBiopsias.classList.remove('error-multi-select');
            }

            if ($('input[name=consentimiento]:checked').length == 0) {

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('El Campo Consentimiento informado, firmado y archivado en ficha cl??nica es requerido!');
                return false;
            }

            if (fieldsPartes.parte_intervenciones.length == 0) {

                let multiselectIntervencion = fieldsPartes.$refs.multiselectIntervencion.$el;
                multiselectIntervencion.scrollIntoView();

                $('#modalForm').modal('hide');
                Swal.close('true');
                iziTe('Las Intervenciones son requeridas!');
                return false;
            }

            var input = $("<input>")
                .attr("type", "hidden")
                .attr("id", "inputEnviar_admin")
                .attr("name", "enviar_admin").val("1");
            $('#guardarEnviarFormEdit').append(input);

            $("#guardarEnviarFormEdit").submit();

        }

        $("#guardarEnviarFormEdit").submit(function (e) {

            Swal.fire({
                title: 'Espera por favor...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timerProgressBar: true,
            });

            Swal.showLoading();

        });

    </script>
@endpush
