<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = json_decode(File::get(database_path('sources/user.json')), true);

        foreach ($users as $user) {
            \App\Models\User::create([
                'nim' => $user['nim'],
                'name' => $user['name'],
                'class' => $user['class'],
                'assistant_code' => $user['assistant_code'],
                'role' => $user['role'],
                'laboratory_id' => $this->getDasproId()
            ]);
        }
    }

    private function getDasproId()
    {
        $id = \App\Models\Laboratory::where('name', 'DASPRO')->first();
        return $id->id;
    }
}
