<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\IntervencionesNew;
use Faker\Generator as Faker;

$factory->define(IntervencionesNew::class, function (Faker $faker) {

    return [
        'cod_prest' => $this->faker->word,
        'corroper' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
