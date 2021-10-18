<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('name', 'Roles:') !!}
    <a class="success" data-toggle="modal" href="#modal-form-clasificacion" tabindex="1000">nueva</a>
    {!!
        Form::select(
            'clasificaciones[]',
            select(\App\Models\Clasificacion::class,'nombre','id',null)
            , null
            , ['id'=>'clasificaciones','class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>
