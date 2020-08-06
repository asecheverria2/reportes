<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Alumno;
use Faker\Generator as Faker;
use App\Nota;


$factory->define(Alumno::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        'cedula' => $faker->text,
        'direccion' => $faker->text,
        'telefono' => $faker->optional()->text,
        'fecha_nacimiento' => $faker->optional()->word,
        'edad' => $faker->optional()->randomDigit,
        'sexo' => $faker->optional()->text,
        //nota HasMany Nota id
    ];
});
