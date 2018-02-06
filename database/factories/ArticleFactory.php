<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 2, $max = 49),
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
