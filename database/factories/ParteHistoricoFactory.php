<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteHistorico;
use Faker\Generator as Faker;

$factory->define(ParteHistorico::class, function (Faker $faker) {

    return [
        'num_parte' => $this->faker->word,
        'rut' => $this->faker->word,
        'fecha' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
