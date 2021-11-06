<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parentesco;
use Faker\Generator as Faker;

$factory->define(Parentesco::class, function (Faker $faker) {


    $nombres =[
        "Touma",
        "Sora",
        "Cloud",
        "Hayate",
        "Sousuke",
        "Tomoya",
        "Koyomi",
        "Yuri",
        "Kyousuke",
        "Kyo",
        "Goku",
        "Gohan",
        "Pikoro",
        "Kira",
        "Crilin",
        "Vulma"
    ];

    return [
        'nombre' => $faker->randomElement($nombres),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
