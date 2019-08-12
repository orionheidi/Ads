<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;

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


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Ad::class, function(Faker $faker){       
    return[
        "title" => $faker->realText(50),
        "description" => $faker->realText(1000),
        "price" => $faker->randomDigit,
        "condition" => App\Ad::CONDITIONS[rand(0,count(App\Ad::CONDITIONS) - 1)],
        "path" =>  $faker->image('public/images',400,300, null, false),
        "phone" =>  $faker->phoneNumber,
        "location" =>  $faker->city,
    ];
 });

 
    $factory->define(App\RoleUser::class, function (Faker $faker) {
        return [
        'user_id' => App\User::all()->random()->id,
        'role_id' => App\Role::all()->random()->id,
        ];
    });

     
    $factory->define(App\CategoryAd::class, function (Faker $faker) {
        return [
        'category_id' => App\Category::all()->random()->id,
        'ad_id' => App\Ad::all()->random()->id,
        ];
    });


