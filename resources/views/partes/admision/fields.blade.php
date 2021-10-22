<!-- Medicamentos Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Medicamentos:') !!} <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>

    {!!
        Form::select(
            'medicamentos[]',
            select(\App\Models\Medicamento::class,'name','id',null)
            , null
            , ['class' => 'form-control duallistbox','multiple']
        )
    !!}
</div>


<div class="row">


    <!-- Extrademanda Field -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="extrademanda" value="0">
        {!! Form::label('extrademanda', 'Extrademanda:') !!}<br>
        <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="extrademanda" id="extrademanda"
               value="1"
            {{ ($parte->extrademanda ?? old('extrademanda') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Segundo Ojo Field -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="segundoojo" value="0">
        {!! Form::label('segundoojo', '2° Ojo:') !!}<br>
        <input type="checkbox" class="cambiar_todos" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="segundoojo" id="segundoojo"
               value="1"
            {{ ($parte->segundoojo ?? old('segundoojo') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Derivación Field -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="derivacion" value="0">
        {!! Form::label('derivacion', 'Derivación:') !!}<br>
        <input type="checkbox" class="derivacion" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="derivacion" id="derivacion"
               value="1"
            {{ ($parte->derivacion ?? old('derivacion') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Exámenes Realizados Field -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="examenes_realizados" value="0">
        {!! Form::label('examenes_realizados', 'Exámenes Realizados:') !!}<br>
        <input type="checkbox" class="examenes_realizados" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="examenes_realizados" id="examenes_realizados"
               value="1"
            {{ ($parte->examenes_realizados ?? old('examenes_realizados') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Control Pre-op EU -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="preop_eu" value="0">
        {!! Form::label('preop_eu', 'Control pre-op EU:') !!}<br>
        <input type="checkbox" class="preop_eu" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="preop_eu" id="preop_eu"
               value="1"
            {{ ($parte->preop_eu ?? old('preop_eu') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Control Pre-op Medico -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="preop_medico" value="0">
        {!! Form::label('preop_medico', 'Control pre-op Medico:') !!}<br>
        <input type="checkbox" class="preop_medico" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="preop_medico" id="preop_medico"
               value="1"
            {{ ($parte->preop_medico ?? old('preop_medico') ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Control Pre-op Anestesista -->
    <div class="col-sm-3 col-lg-3">
        <input type="hidden" name="preop_anestesista" value="0">
        {!! Form::label('preop_anestesista', 'Control pre-op Anestesista:') !!}<br>
        <input type="checkbox" class="preop_anestesista" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="preop_anestesista" id="preop_anestesista"
               value="1"
            {{ ($parte->preop_anestesista ?? old('preop_anestesista') ?? false) ? 'checked' : '' }}>
    </div>
</div>
<div class="row">
    <!-- Correo Electrónico -->
    <div class="form-group col-sm-3">
        {!! Form::label('email', 'Correo Electrónico:') !!}
        {!! Form::email('email', null, ['id' => 'email','class' => 'form-control']) !!}

    </div>

    <!-- Tiempo Quirurgico Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cambio_medico', 'Cambio de Medico:') !!}
        <br>
        <select class="form-control">

            @foreach(App\Models\User::where('username', 'Medico')->get() as $user)

                <option value="{{ $user->id }}" >
                    {{ $user->name }}
                </option>

            @endforeach

        </select>
        <input type="hidden" name="cambio_medico" :value="cambio_medico">
    </div>

    <!-- Condición Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('condicion', 'Condición:') !!}

        <br>
        <select class="form-control">

            @foreach(App\Models\Condicion::get() as $condicion)

                <option value="{{ $condicion->id }}" >
                    {{ $condicion->nombre }}
                </option>

            @endforeach

        </select>
        <input type="hidden" name="condicion" :value="condicion">
    </div>

    <!-- Sistema Salud Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('sistemasalud_id', 'Sistema Salud:') !!}
        <br>
        <select class="form-control" name="sistemasalud_id">

            @foreach(App\Models\SistemaSalud::get() as $sistemasalud)

                <option value="{{ $sistemasalud->id }}" >
                    {{ $sistemasalud->nombre }}
                </option>

            @endforeach

        </select>

    </div>

    <!-- Grupo Base Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('grupobase_id', 'Grupo Base:') !!}
        <br>
        <select class="form-control" name="grupobase_id">

            @foreach(App\Models\Grupobase::get() as $grupobase)

                <option value="{{ $grupobase->id }}" >
                    {{ $grupobase->nombre }}
                </option>

            @endforeach

        </select>

    </div>
</div>
