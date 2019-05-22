<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Advertisement;
use App\User;
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

$factory->define( Advertisement::class, function ( Faker $faker ) {
    return [
        'title'        => $faker->title,
        'text'         => $faker->text,
        'image'        => $faker->imageUrl( 640, 480, 'cats', true, $faker->bothify('Sorin Lulian ######') ),
        'sponsored_by' => $faker->name,
        'tracking_url' => $faker->url,
    ];
} );
