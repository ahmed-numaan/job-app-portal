<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;

class VacancySkillTableSeeder extends Seeder
{
    public function run()
    {
        $vacancyIds = \DB::table('vacancies')->pluck('id')->toArray();
        $skillIds = \DB::table('skills')->pluck('id')->toArray();

        foreach ($vacancyIds as $vacancy) {
            \DB::table('vacancy_skill')->insert([
                'vacancy_id' => $vacancy,
                'skill_id' => collect($skillIds)->random(),
            ]);
        }
    }
}

