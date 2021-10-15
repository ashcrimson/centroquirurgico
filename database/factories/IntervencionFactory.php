<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Intervencion;
use Faker\Generator as Faker;

$factory->define(Intervencion::class, function (Faker $faker) {

    return [
        'cod_fonasa' => $this->faker->word,
        'nombre' => $this->faker->word,
        'legado_sn' => $this->faker->word,
        'cod_as400' => $this->faker->word,
        'codpab' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
