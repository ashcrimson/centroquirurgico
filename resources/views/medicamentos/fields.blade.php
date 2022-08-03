<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- suspension_dias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('suspension_dias', 'Suspender días/horas:') !!}
    {!! Form::number('suspension_dias', null, ['class' => 'form-control']) !!}
</div>

<!-- reiniciar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reiniciar', 'Reiniciar:') !!}
    {!! Form::text('reiniciar', null, ['class' => 'form-control']) !!}
</div>

<!-- consideraciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consideraciones', 'Consideraciones:') !!}
    {!! Form::text('consideraciones', null, ['class' => 'form-control']) !!}
</div>
