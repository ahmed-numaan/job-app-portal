<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;

class UserSkillTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = \DB::table('users')->where('role', 'job_seeker')->pluck('id')->toArray();
        $skillIds = \DB::table('skills')->pluck('id')->toArray();

        foreach ($userIds as $user) {
            \DB::table('user_skill')->insert([
                'user_id' => $user,
                'skill_id' => collect($skillIds)->random(),
                'level'   => collect(['beginner','intermediate','advanced'])->random(),
            ]);
        }
    }
}

