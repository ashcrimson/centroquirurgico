@extends('layouts.app')

@section('title_page',__('Edit Parte'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>
                        {{__('Editar Parte')}}
                    </h1>
                </div>
                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('partes.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('List')}}</span>
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

                    {!! Form::model($parte, ['route' => ['partes.update', $parte->id], 'method' => 'patch','class' => 'wait-on-submit']) !!}
                    <div class="form-row">

                    @include('partes.show_fields')
                    @include('partes.admision.fields')

                    <!-- Submit Field -->
                        <div class="form-group col-sm-12 text-right">
                            <a href="{!! route('partes.index') !!}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fa fa-floppy-o"></i> Guardar
                            </button>

                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
