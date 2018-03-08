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
        'username'=> $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'admin'=>$faker->randomElement([true, false]),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Kategori::class, function (Faker $faker) {
    return [
        'nama' => $faker->word,
        'deskripsi'=> $faker->word,
    ];
});

$factory->define(App\UserDetail::class, function (Faker $faker) {
    return [
        'id_user' => App\User::all()->random()->id,
        'deskripsi'=> $faker->paragraph(1),
        'jenis_kelamin'=>$faker->randomElement(['l', 'p'])
    ];
});
