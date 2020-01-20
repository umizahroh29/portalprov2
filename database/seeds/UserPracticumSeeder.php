<?php

use Illuminate\Database\Seeder;

class UserPracticumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = json_decode(File::get(database_path('sources/user_practicum.json')), true);

        foreach ($users as $user) {
            \App\Models\PracticumUser::create([
                'practicum_id' => $this->getPracticumId(),
                'user_nim' => $user['user_nim'],
                'assistant_code' => $user['assistant_code'],
                'role' => $user['role'],
            ]);
        }
    }

    private function getPracticumId()
    {
        $id = \App\Models\Practicum::first();
        return $id->id;
    }
}
