<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MastercodeSeeder::class);
        $this->call(LaboratorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PracticumSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(AssessmentSeeder::class);
        $this->call(UserPracticumSeeder::class);
        $this->call(ModuleAssessmentSeeder::class);
    }
}
