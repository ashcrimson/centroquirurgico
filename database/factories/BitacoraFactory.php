<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bitacora;
use Faker\Generator as Faker;

$factory->define(Bitacora::class, function (Faker $faker) {

    return [
        'parte_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'titulo' => $this->faker->word,
        'descripcion' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
