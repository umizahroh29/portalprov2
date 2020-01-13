<?php

use Illuminate\Database\Seeder;

class MastercodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mastercodes = json_decode(File::get(database_path('sources/mastercode.json')), true);

        foreach ($mastercodes as $mastercode) {
            \App\Models\Mastercode::create([
                'parent_code' => $mastercode['parent_code'],
                'code' => $mastercode['code'],
                'description' => $mastercode['description']
            ]);
        }
    }
}
