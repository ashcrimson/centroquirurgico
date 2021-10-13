<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parte;
use Faker\Generator as Faker;

$factory->define(Parte::class, function (Faker $faker) {

    return [
        'paciente_id' => $this->faker->word,
        'cirugia_tipo_id' => $this->faker->word,
        'especialidad_id' => $this->faker->word,
        'diagnostico' => $this->faker->text,
        'otros_diagnosticos' => $this->faker->text,
        'intervencion' => $this->faker->text,
        'lateralidad' => $this->faker->word,
        'otras_intervenciones' => $this->faker->text,
        'cma' => $this->faker->word,
        'clasificacion_id' => $this->faker->word,
        'tiempo_quirurgico' => $this->faker->randomDigitNotNull,
        'anestesia_sugerida' => $this->faker->word,
        'aislamiento' => $this->faker->word,
        'alergia_latex' => $this->faker->word,
        'usuario_taco' => $this->faker->word,
        'nececidad_cama_upc' => $this->faker->word,
        'prioridad' => $this->faker->word,
        'necesita_donante_sangre' => $this->faker->word,
        'evaluacion_preanestesica' => $this->faker->word,
        'equipo_rayos' => $this->faker->word,
        'insumos_especificos' => $this->faker->word,
        'preoperatorio_id' => $this->faker->word,
        'biopsia' => $this->faker->word,
        'user_ingresa' => $this->faker->word,
        'estado_id' => $this->faker->word,
        'pabellon_id' => $this->faker->randomDigitNotNull,
        'fecha_pabellon' => $this->faker->date('Y-m-d H:i:s'),
        'fecha_digitacion' => $this->faker->date('Y-m-d H:i:s'),
        'instrumental' => $this->faker->text,
        'observaciones' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
