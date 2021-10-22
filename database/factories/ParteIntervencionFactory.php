<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteIntervencion;
use Faker\Generator as Faker;

$factory->define(ParteIntervencion::class, function (Faker $faker) {

    return [
        'parte_id' => $this->faker->word,
        'intervencion_id' => $this->faker->word,
        'lateralidad' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
