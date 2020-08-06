<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;


$factory->define(Section::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        'detalle' => $faker->text(1024),
    ];
});
