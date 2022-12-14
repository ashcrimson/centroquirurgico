<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteEstado;
use Faker\Generator as Faker;

$factory->define(ParteEstado::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'siglas' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
    ];
});
