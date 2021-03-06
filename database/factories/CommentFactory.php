<?php

use Faker\Generator as Faker;
use App\Comment;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'article_id' => $faker->numberBetween($min = 1, $max = 100),
        'user_id' => $faker->numberBetween($min = 1, $max = 100),
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
