<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Siglas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siglas', 'Siglas:') !!}
    {!! Form::text('siglas', null, ['class' => 'form-control','maxlength' => 3,'maxlength' => 3,'maxlength' => 3]) !!}
</div>
