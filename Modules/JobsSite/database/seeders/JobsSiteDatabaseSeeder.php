<?php

namespace Modules\JobsSite\Database\Seeders;

use Illuminate\Database\Seeder;

class JobsSiteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            VacanciesTableSeeder::class,
            SkillsTableSeeder::class,
            UserSkillTableSeeder::class,
            VacancySkillTableSeeder::class,
            ApplicationsTableSeeder::class,
        ]);
    }
}
