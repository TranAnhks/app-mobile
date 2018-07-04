<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductDetail::class, function (Faker $faker) {
    return [
    	'cpu' => $faker->unique()->word,
		'ram' => $faker->unique()->word,
		'screen' => $faker->unique()->word,
		'storage' => $faker->unique()->word,
		'exten_memmory' => $faker->unique()->word,
		'cam1' => $faker->unique()->word,
		'cam2' => $faker->unique()->word,
		'sim' => $faker->unique()->word,
		'pin' => $faker->unique()->word,
		'os' => $faker->unique()->word,
		'product_id' => $faker->unique()->word,
    ];
});
