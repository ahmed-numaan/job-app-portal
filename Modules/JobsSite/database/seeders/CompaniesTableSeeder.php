<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $i) {
            \DB::table('companies')->insert([
                'name' => $faker->company,
                'contact_person' => $faker->contact_person,
                'description' => $faker->paragraph,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
                'logo' => null,
                'created_at' => now(),
            ]);
        }
    }
}

