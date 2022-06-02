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

                   {!! Form::close() !!}

                    <div class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelTitleId">
                                        Guardar y Enviar a Admisión
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        ¿Estás seguro de guardar y enviar a Admisión?
                                        <br>
                                        Indique al paciente que se dirija a admisión
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cerrar
                                    </button>
                                    <button type="submit" class="btn btn-danger" onclick="guardarEnviar()" name="enviar_admin" id="enviar_admin" value="1">
                                        Guardar Y Enviar Admisión
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

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
        }

        $("#guardarEnviarFormEdit").submit(function (e) {

            if (!$("input[name='cirugia_tipo_id']").val()) {
                Swal.close('true');
                iziTe('El Campo Tipo Cirugía es requerido!');
                return false;
            }

            if (!$("input[name='especialidad_id']").val()) {
                Swal.close('true');
                iziTe('El Campo Especialidad es requerido!');
                return false;
            }

            if (!$("input[name='tiempo_quirurgico']").val()) {
                Swal.close('true');
                iziTe('El Campo Tiempo Quirúrgico es requerido!');
                return false;
            }

            if (!$("input[name='anestesia_sugerida']").val()) {
                Swal.close('true');
                iziTe('El Campo Anestesia Sugerida es requerido!');
                return false;
            }

            if ($('input[name=nececidad_cama_upc]:checked').length == 1) {
                if (!$("input[name='tipo_cama_upc']").val()) {
                    Swal.close('true');
                    iziTe('El Campo Tipo Cama UPC es requerido!');
                    return false;
                }
            }

            if (!$("input[name='cancer']").val()) {
                Swal.close('true');
                iziTe('El Campo Cáncer o Sospecha de Cáncer es requerido!');
                return false;
            }

            if (!$("input[name='preoperatorio_id']").val()) {
                Swal.close('true');
                iziTe('El Campo Ex Preoperatorios es requerido!');
                return false;
            }

            if (!$("input[name='grupo_base_id']").val()) {
                Swal.close('true');
                iziTe('El Campo Grupo Base es requerido!');
                return false;
            }

            if (!$("input[name='biopsia']").val()) {
                Swal.close('true');
                iziTe('El Campo Biopsias es requerido!');
                return false;
            }

            if ($('input[name=consentimiento]:checked').length == 0) {
                Swal.close('true');
                iziTe('El Campo Consentimiento informado, firmado y archivado en ficha clínica es requerido!');
                return false;
            }

            guardarEnviar();

        });

    </script>
@endpush
