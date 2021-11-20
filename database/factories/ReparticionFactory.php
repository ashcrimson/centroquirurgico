<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reparticion;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Reparticion::class, function (Faker $faker) use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'nombre' => "Institución - ".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
