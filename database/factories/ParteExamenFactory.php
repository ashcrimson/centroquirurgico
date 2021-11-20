<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteExamen;
use Faker\Generator as Faker;

$factory->define(ParteExamen::class, function (Faker $faker) {

    return [
        'parte_id' => $this->faker->word,
        'examen_id' => $this->faker->word
    ];
});
