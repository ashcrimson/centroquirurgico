<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Diagnostico;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Diagnostico::class, function (Faker $faker) use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'codigo' => prefijoCeros($autoIncrement->current(),2),
        'nombre' => "Diagnostico - ".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
