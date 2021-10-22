@extends('layouts.app')

@section('title_page',__('Parte'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Parte')}}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('partes.index') }}" class="btn btn-default">
                        {{__('Back')}}
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        Info parte
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        Bitacora
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card card-secondary">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('partes.show_fields')
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card card-outline card-success">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('partials.bitacora',['bitacoras' => $parte->bitacoras ?? collect()])
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <a href="{{ route('partes.index') }}" class="btn btn-default">
                {{__('Back')}}
            </a>
            <br>
            <br>
        </div>


    </div>
@endsection
