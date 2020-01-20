<?php

use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratories = json_decode(File::get(database_path('sources/laboratories.json')), true);

        foreach ($laboratories as $laboratory) {
            \App\Models\Laboratory::create([
                'name' => $laboratory['name']
            ]);
        }
    }
}
