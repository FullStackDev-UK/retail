<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'subject' => $faker->randomElement(['Job offer','Collaboration','Advertising','Issue raised','Bug update','Hosting info']),
        'message' => $faker->sentence(),
    ];
});
