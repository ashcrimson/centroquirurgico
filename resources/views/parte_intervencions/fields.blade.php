<!-- Parte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parte_id', 'Parte Id:') !!}
    {!! Form::number('parte_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Intervencion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('intervencion_id', 'Intervencion Id:') !!}
    {!! Form::number('intervencion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lateralidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lateralidad', 'Lateralidad:') !!}
    {!! Form::text('lateralidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
