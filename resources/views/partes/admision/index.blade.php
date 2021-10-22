@extends('layouts.app')

@section('title_page',__('Partes'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Partes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            @can('Crear Partes')
                            <a class="btn btn-outline-success"
                                href="{!! route('partes.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('Nuevo')}}</span>
                            </a>
                            @endcan
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Filtros</h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('partes.admision.form_filters')
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-primary">
                <div class="card-body">
                        @include('partes.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

