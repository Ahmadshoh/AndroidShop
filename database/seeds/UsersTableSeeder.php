<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = [];

        $users[] = [
            'name'              => 'Ahmadshoh',
            'email'             => 'ahmadshohnasrulloev1@gmail.com',
            'phone'             => '+992987730202',
            'email_verified_at' => now(),
            'password'          => Hash::make('aaaaaa'), // password
            'admin'             => 1,
            'remember_token'    => Str::random(10)
        ];

        for ($i = 1; $i <= 130; $i++) {
            $users[] = [
                'name'              => $faker->name,
                'email'             => $faker->email,
                'phone'             => $faker->phoneNumber,
                'email_verified_at' => now(),
                'password'          => Hash::make(Str::random(12)), // password
                'admin'             => 0,
                'remember_token'    => Str::random(10)
            ];
        }

        DB::table('users')->insert($users);
    }
}
