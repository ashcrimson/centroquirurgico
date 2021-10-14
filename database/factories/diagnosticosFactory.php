<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\diagnosticos;
use Faker\Generator as Faker;

$factory->define(diagnosticos::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
