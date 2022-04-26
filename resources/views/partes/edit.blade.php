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

                   {!! Form::model($parte, ['route' => ['partes.update', $parte->id], 'method' => 'patch','class' => 'wait-on-submit', 'id' => 'guardarEnviarFormEdit']) !!}
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

            // $("#enviar_admin").val(1);
            //
            // document.getElementById("guardarEnviarFormEdit").submit();
        }

    </script>
@endpush
