<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use \Psy\Util;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    $title = $faker->sentence(3, 6);
    $txt = $faker->realText(rand(150, 300));
    $alif_link = "https://alif.shop/phone/huawei/huawei-y9s-6-128-gb-ru/";

    $data = [
        'category_id'   => rand(8, 30),
        'title'         => $title,
        'alias'         => Str::slug($title),
        'alif_link'     => $alif_link,
        'price'         => rand(100, 22500),
        'amount'        => rand(3, 100),
        'description'   => $txt,
        'image'         => '/phones/' . rand(1, 6) . '.png',
        'visible'       => rand(true, false),
        'recommended'   => rand(true, false)
    ];

    return $data;
});
