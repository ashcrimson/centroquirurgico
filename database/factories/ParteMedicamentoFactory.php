<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ParteMedicamento;
use Faker\Generator as Faker;

$factory->define(ParteMedicamento::class, function (Faker $faker) {

    return [
        'parte_id' => $this->faker->word,
        'medicamento_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
