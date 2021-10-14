<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Intervenciones;
use Faker\Generator as Faker;

$factory->define(Intervenciones::class, function (Faker $faker) {

    return [
        'cod_fonasa' => $this->faker->word,
        'glosa' => $this->faker->word,
        'legado_sn' => $this->faker->word,
        'cod_as400' => $this->faker->word,
        'codpab' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
