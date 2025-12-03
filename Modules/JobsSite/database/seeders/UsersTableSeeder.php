<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create 1 admin
        \DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => $faker->phoneNumber,
        ]);

        // Employers
        foreach (range(1, 5) as $i) {
            \DB::table('users')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->email,
                'password' => Hash::make('password'),
                'role' => 'employer',
                'phone' => $faker->phoneNumber,
            ]);
        }

        // Job seekers
        foreach (range(1, 20) as $i) {
            \DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => 'job_seeker',
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}

