<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

function typeSelector(){
    $types = ['First type','Second type', 'Third type', 'Fourth Type', 'Fifth Type', 'Sixth Type', 'Seventh Type', 'Eigth Type', 'Ninth Type', 'Tenth Type'];
    $k = array_rand($types,1);
    $v = $types[$k];
    return $v;
}

function nameSelector(){
    $names = ['Alpha','Beta', 'Gamma', 'Delta', 'Epsilon', 'Zeta', 'Eta', 'Theta', 'Iota', 'Kappa', 'Lambda', 'Mu', 'Nu', 'Xi', 'Omicron', 'Pi', 'Rho', 'Sigma', 'Tau', 'Upsilon', 'Phi', 'Chi', 'Psi', 'Omega'];
    $k = array_rand($names,1);
    $v = $names[$k];
    return $v;
}

$factory->define(Product::class, function (Faker $faker) {
    return [
        'type' => typeSelector(),
        'name' => nameSelector(),
        'description' => $faker->paragraph(3),
        'size' => $faker->numberBetween(10,100),
        'price' => $faker->numberBetween(30,100)
    ];
});
