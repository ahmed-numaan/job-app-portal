<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $jobSeekerIds = \DB::table('users')->where('role', 'job_seeker')->pluck('id');
        $vacancyIds = \DB::table('vacancies')->pluck('id');

        foreach (range(1, 50) as $i) {
            \DB::table('applications')->insert([
                'user_id' => $faker->randomElement($jobSeekerIds),
                'vacancy_id' => $faker->randomElement($vacancyIds),
                'resume' => null,
                'cover_letter' => $faker->paragraph,
                'status' => $faker->randomElement(['pending','reviewed','accepted','rejected']),
                'created_at' => now(),
            ]);
        }
    }
}

