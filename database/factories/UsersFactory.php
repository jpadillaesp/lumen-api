<?php

use Illuminate\Support\Facades\Hash;

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
        'email' => $faker->email,
        'confirmed' => $faker->numberBetween(0, 1),//2147483647
        'blacklisted' => $faker->numberBetween(0, 1),
        'optedin' => $faker->numberBetween(0, 1),
        'bouncecount' => $faker->numberBetween(0, 1),
        'entered' => $faker->dateTime,
        'modified' => $faker->dateTime,
        'uniqid' => $faker->text(255),
        'uuid' => $faker->uuid,
        'htmlemail' => $faker->numberBetween(0, 1),
        'subscribepage' => $faker->numberBetween(0, 1),
        'rssfrequency' => $faker->text(100),
        'password' => Hash::make('abc'),
        'passwordchanged' => $faker->dateTime,
        'disabled' => $faker->numberBetween(0, 1),
        'extradata' => $faker->text,
        'foreignkey' => $faker->text(100),
    ];
});
