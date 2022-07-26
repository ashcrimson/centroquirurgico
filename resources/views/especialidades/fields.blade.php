<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('codigo_especialidad', 'Codigo Especialidad:') !!}
    {!! Form::text('codigo_especialidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Sub Especialidades:') !!}
{{--    <a class="success" data-toggle="modal" href="#modal-form-roles" tabindex="1000">nuevo</a>--}}
    {!!
        Form::select(
            'especialidadSubs[]',
            select(\App\Models\EspecialidadSub::class,'nombre','id',null)
            , null
            , ['id'=>'especialidadSubs','class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', 'Grupos base:') !!}
{{--    <a class="success" data-toggle="modal" href="#modal-form-roles" tabindex="1000">nuevo</a>--}}
    {!!
        Form::select(
            'patologias[]',
            select(\App\Models\GrupoBase::class,'nombre','id',null)
            , null
            , ['id'=>'patologias','class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>
