<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteContacto;
use Faker\Generator as Faker;

$factory->define(ParteContacto::class, function (Faker $faker) {

    return [
        'tipo_id' => $this->faker->word,
        'parte_id' => $this->faker->word,
        'numero' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
