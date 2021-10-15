<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Diagnostico;
use Faker\Generator as Faker;

$factory->define(Diagnostico::class, function (Faker $faker) {

    return [
        'cdogio' => $this->faker->word,
        'nombre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
