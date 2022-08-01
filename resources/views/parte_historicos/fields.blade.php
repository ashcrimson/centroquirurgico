<!-- Num Parte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_parte', 'Num Parte:') !!}
    {!! Form::number('num_parte', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::number('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', isset($parteHistorico) ? $parteHistorico->fecha->format('Y-m-d') : '', ['class' => 'form-control','id'=>'fecha']) !!}
</div>

{{--@section('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#fecha').datetimepicker({--}}
{{--            format: 'YYYY-MM-DD HH:mm:ss',--}}
{{--            useCurrent: false--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}
