<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,10),
        'image_address' => $faker->randomElement(['/retail/public/images/Bottle_edit.jpg','/retail/public/images/Group_Bottles_edit.jpg'])
    ];
});
