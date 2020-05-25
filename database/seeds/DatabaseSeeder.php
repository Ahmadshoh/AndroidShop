<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         factory(\App\Models\Product::class, 25)->create();
         factory(\App\Models\Slider::class, 7)->create();
    }
}
