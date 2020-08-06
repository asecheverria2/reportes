<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Nota;
use Faker\Generator as Faker;
use App\Alumno;
use App\Materia;


$factory->define(Nota::class, function (Faker $faker) {
    return [
        'alumno_id' => $faker->optional()->randomDigit,
        'materia_id' => $faker->optional()->randomDigit,
        'nota1' => $faker->optional()->randomFloat(),
        'nota2' => $faker->optional()->randomFloat(),
        'nota3' => $faker->optional()->randomFloat(),
        'observacion' => $faker->optional()->text(1024),
        //alumno BelongsTo Alumno alumno_id
        //materia BelongsTo Materia materia_id
    ];
});
