<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VacanciesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $companyIds = \DB::table('companies')->pluck('id')->toArray();

        foreach (range(1, 30) as $i) {
            \DB::table('vacancies')->insert([
                'company_id' => $faker->randomElement($companyIds),
                'title' => $faker->jobTitle,
                'description' => $faker->paragraph(4),
                'location' => $faker->city,
                'salary_min' => rand(30000, 70000),
                'salary_max' => rand(70000, 150000),
                'vacancy_type' => $faker->randomElement(['full_time','part_time','contract','internship']),
                'experience_level' => $faker->randomElement(['junior','mid','senior']),
                'is_active' => 1,
                'created_at' => now(),
            ]);
        }
    }
}

