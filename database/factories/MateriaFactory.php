<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Materia;
use Faker\Generator as Faker;
use App\Nota;


$factory->define(Materia::class, function (Faker $faker) {
    return [
        'mat_nombre' => $faker->text,
        'mat_docente' => $faker->text,
        'mat_nrc' => $faker->randomDigit,
        'mat_horas' => $faker->randomDigit,
        //nota HasMany Nota id
    ];
});
