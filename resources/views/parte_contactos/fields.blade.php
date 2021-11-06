<!-- Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    {!! Form::number('tipo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Parte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parte_id', 'Parte Id:') !!}
    {!! Form::number('parte_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Parentesco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco_id', 'Parentesco Id:') !!}
    {!! Form::number('parentesco_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
