<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' =>$faker->phoneNumber,
        'sex' =>$faker->boolean,
        'address'=> $faker->address,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

    // $factory->define(App\Category::class, function (Faker $faker) {
    //     return [
    //         'cat_name' => $faker->name,
    //         'photo' =>  $faker->imageUrl,
    //         // 'slug'=>$faker->sentence,
    //     ];
    // });
    $factory->define(App\Post::class, function (Faker $faker) {
        return [
            'cat_id' =>  rand(1,10),
            'user_id' =>  rand(1,10),
            'city_id' =>  rand(1,63),
            'title' =>  $faker->sentence,
            // 'slug'=>$faker->sentence,
            'description' =>  $faker->paragraph,
            'photo' =>  "null.png",
            'price' =>rand(),
        ];
    });

    $factory->define(App\Message::class, function (Faker $faker) {
        do {
            $from = rand(1, 15);
            $to = rand(1, 15);
        } while ($from === $to);
    
        return [
            'from' => $from,
            'to' => $to,
            'text' => $faker->sentence
        ];
    });