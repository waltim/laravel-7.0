<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->tollFreePhoneNumber,
        'motivo' => $faker->numberBetween(1,3),
        'mensagem' => $faker->text(255)
    ];
});
