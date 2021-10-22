<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Convenio;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Convenio::class, function (Faker $faker) use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'nombre' => "Convenio - ".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
