<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EspecialidadSub;
use Faker\Generator as Faker;

$factory->define(EspecialidadSub::class, function (Faker $faker) {

    return [
        'especialidad_id' => $this->faker->word,
        'nombre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
