<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male','female']);

    return [
        'email' => $faker->email,
        'text_message' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
