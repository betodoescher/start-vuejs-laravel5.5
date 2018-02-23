<?php

use Faker\Generator as Faker;

$factory->define(\App\Protocolo::class, function (Faker $faker) {
    return [
        'formulario_id' => $faker->numberBetween(1, 30),
        'protocolo' => $faker->numberBetween(11111111,99999999)
    ];
});
