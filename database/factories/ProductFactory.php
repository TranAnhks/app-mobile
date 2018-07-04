<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
	return [
  		'name' => $faker->unique()->word,
		'promo' => $faker->numberBetween($min = 10, $max = 200),
		'packet' => $faker->city,
		'price' => '123123',
		'status' =>  rand(0, 1),
		'images' => 'product' . $faker->numberBetween($min = 1, $max = 15) . '.jpg',
		'category_id' => App\Models\Category::all()->random()->id,
	];
});
