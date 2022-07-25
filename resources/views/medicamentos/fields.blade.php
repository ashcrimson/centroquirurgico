<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- suspension_dias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('suspension_dias', 'Suspension (días):') !!}
    {!! Form::number('suspension_dias', null, ['class' => 'form-control']) !!}
</div>
