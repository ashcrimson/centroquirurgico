<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Intervencion;
use Faker\Generator as Faker;

$autoIncrement = autoIncrementFaker();

$factory->define(Intervencion::class, function (Faker $faker) use ($autoIncrement){

    $autoIncrement->next();

    return [
        'cod_fonasa' => prefijoCeros($autoIncrement->current(),2),
        'nombre' => "Intervencion - ".$autoIncrement->current(),
        'legado_sn' => $this->faker->word,
        'cod_as400' => $this->faker->word,
        'codpab' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
    ];
});
