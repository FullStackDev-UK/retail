<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [        
        'order_id' => 1,
        'product_id' => 2,
        'quantity' => 4,
        'price' => 10,
        'total' => 40
    ];
});
