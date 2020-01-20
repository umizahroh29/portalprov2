<?php

use Illuminate\Database\Seeder;

class PracticumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $practicums = json_decode(File::get(database_path('sources/practicum.json')), true);

        foreach ($practicums as $practicum) {
            \App\Models\Practicum::create([
                'laboratory_id' => $this->getDasproId(),
                'name' => $practicum['name'],
                'year' => $practicum['year']
            ]);
        }
    }

    private function getDasproId()
    {
        $id = \App\Models\Laboratory::where('name', 'DASPRO')->first();
        return $id->id;
    }
}
