<?php

use Illuminate\Database\Seeder;
use \Psy\Util;
use \Illuminate\Support\Facades;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [];

//        $categoryName = 'Без категорий';
//        $categories[] = [
//            'name'      => $categoryName,
//            'alias'     => Str::slug($categoryName),
//            'parent_id' => 0
//        ];

        for ($i = 1; $i <= 15; $i++) {
            $categoryName = 'Категория №' . $i;
            $parentId = ($i > 7) ? rand(1, 7) : 0;

            $categories[] = [
                'name'      => $categoryName,
                'alias'     => Str::slug($categoryName),
                'parent_id' => $parentId,
                'created_at'=> now(),
                'updated_at'=> now()
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
