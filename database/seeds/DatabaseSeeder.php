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
    }
}
