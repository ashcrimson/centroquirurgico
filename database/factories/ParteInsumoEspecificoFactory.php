<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteInsumoEspecifico;
use Faker\Generator as Faker;

$factory->define(ParteInsumoEspecifico::class, function (Faker $faker) {

    return [
        'parte_id' => $this->faker->word,
        'insumo_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
