<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clasificacion;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Clasificacion::class, function (Faker $faker) use ($autoIncrement){

    $autoIncrement->next();

    return [
        'nombre' => "Clasificación -".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
