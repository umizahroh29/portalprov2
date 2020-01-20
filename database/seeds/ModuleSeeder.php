<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = json_decode(File::get(database_path('sources/module.json')), true);

        foreach ($modules as $module) {
            \App\Models\Module::create([
                'practicum_id' => $this->getPracticumId(),
                'name' => $module['name'],
                'module_link' => $module['module_link'],
                'grade_publish_date' => $module['grade_publish_date']
            ]);
        }
    }

    private function getPracticumId()
    {
        $id = \App\Models\Practicum::first();
        return $id->id;
    }
}
