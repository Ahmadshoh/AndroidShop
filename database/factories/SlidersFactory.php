<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    return [
        'image_path'  =>  '/storage/slider/' . rand(2, 5) . '.png'
    ];
});
