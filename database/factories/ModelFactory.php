<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Challenge\User::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    return [
        'name'      => $name,
        'slug'      => str_slug($name),
        'email'     => $faker->safeEmail,
        'password'  => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Challenge\Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(3);    
    return [
        'title'     => $title,
        'excerpt'   => $faker->text(128),
        'slug'      => str_slug($title),
        'body'      => '<p>' . $faker->text(rand(400,800)) . '</p>' . '<p>' . $faker->text(rand(400,800)) . '</p>',
        'user_id'   => rand(1,50),
    ];
});