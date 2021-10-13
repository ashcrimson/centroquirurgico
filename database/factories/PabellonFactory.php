<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pabellon;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Pabellon::class, function (Faker $faker) use ($autoIncrement){

    $autoIncrement->next();

    return [
        'nombre' => "Pabellon -".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
