<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Preoperatorio;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Preoperatorio::class, function (Faker $faker)  use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'nombre' => "Preoperatorio -".$autoIncrement->next(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});

