<?php

use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessments = json_decode(File::get(database_path('sources/assessment.json')), true);

        foreach ($assessments as $assessment) {
            \App\Models\Assessment::create([
                'practicum_id' => $this->getPracticumId(),
                'name' => $assessment['name'],
                'percentage' => $assessment['percentage'],
                'duration' => $assessment['duration'],
                'question_count' => $assessment['question_count'],
                'answer_type' => $assessment['answer_type'],
                'isSoftFileQuestion' => $assessment['isSoftFileQuestion'],
                'isOnline' => $assessment['isOnline']
            ]);
        }
    }

    private function getPracticumId()
    {
        $id = \App\Models\Practicum::first();
        return $id->id;
    }
}
