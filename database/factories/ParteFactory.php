<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CirugiaTipo;
use App\Models\Clasificacion;
use App\Models\Diagnostico;
use App\Models\Especialidad;
use App\Models\Intervencion;
use App\Models\Paciente;
use App\Models\Parte;
use App\Models\ParteEstado;
use App\Models\Preoperatorio;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Parte::class, function (Faker $faker) {

    $fechaParte = \Carbon\Carbon::now()->subDays(rand(1,4));
    return [
        'paciente_id' => Paciente::all()->random()->id,
        'cirugia_tipo_id' => CirugiaTipo::all()->random()->id,
        'especialidad_id' => Especialidad::all()->random()->id,
        'diagnostico_id' => Diagnostico::all()->random()->id,
        'otros_diagnosticos' => $faker->text,
        'intervencion_id' => Intervencion::all()->random()->id,
        'lateralidad' => $faker->randomElement(['Izquierda', 'Derecha', 'Bilateral', 'No Aplica',]),
        'otras_intervenciones' => $faker->text,
        'cma' => $faker->boolean,
        'clasificacion_id' => Clasificacion::all()->random()->id,
        'tiempo_quirurgico' => $faker->randomElement([30, 60, 90, 120, 150, 180, 210, 240, 270, 300,]),
        'anestesia_sugerida' => $faker->word,
        'aislamiento' => $faker->boolean,
        'alergia_latex' => $faker->boolean,
        'usuario_taco' => $faker->boolean,
        'nececidad_cama_upc' => $faker->boolean,
        'prioridad' => $faker->boolean,
        'necesita_donante_sangre' => $faker->boolean,
        'evaluacion_preanestesica' => $faker->boolean,
        'equipo_rayos' => $faker->boolean,
        'insumos_especificos' => $faker->boolean,
        'preoperatorio_id' => Preoperatorio::all()->random()->id,
        'biopsia' => $faker->randomElement([
            'Externa',
            'Rápida',
            'Diferida',
            'Citometría de flujo',
            'No aplica',
        ]),
        'user_ingresa' => User::role(['Medico','Admisión'])->get()->random()->id,
        'estado_id' => ParteEstado::all()->random()->id,
        'pabellon_id' => null,
        'fecha_pabellon' => null,
        'fecha_digitacion' => null,
        'instrumental' => $faker->text,
        'observaciones' => $faker->text,
        'created_at' => $fechaParte,
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
