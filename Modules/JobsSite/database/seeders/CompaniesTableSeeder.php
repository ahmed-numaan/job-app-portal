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
                'description' => $faker->paragraph,
                'website' => $faker->url,
                'logo' => null,
                'created_at' => now(),
            ]);
        }
    }
}

