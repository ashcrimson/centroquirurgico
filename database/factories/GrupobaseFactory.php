<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Grupobase;
use Faker\Generator as Faker;

$factory->define(Grupobase::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
