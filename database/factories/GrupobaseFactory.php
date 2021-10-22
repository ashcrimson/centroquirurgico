<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\GrupoBase;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();


$factory->define(GrupoBase::class, function (Faker $faker) use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'nombre' => "Grupo Base - ".$autoIncrement->current(),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
