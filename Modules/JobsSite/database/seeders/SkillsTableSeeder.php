<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            'PHP','Laravel','JavaScript','Vue.js','React','MySQL','CSS','HTML','DevOps',
            'Docker','AWS','UI/UX','Python','Java','Communication','Leadership'
        ];

        foreach ($skills as $skill) {
            \DB::table('skills')->insert([
                'name' => $skill,
                'created_at' => now(),
            ]);
        }
    }
}

