<?php

use Illuminate\Database\Seeder;

class ModuleAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module_assessments = json_decode(File::get(database_path('sources/module_assessments.json')), true);

        $modules = \App\Models\Module::all();
        $assessments = \App\Models\Assessment::all();
        foreach ($modules as $module) {
            foreach ($assessments as $assessment) {
                \App\Models\ModuleAssessment::create([
                    'assessment_id' => $assessment->id,
                    'module_id' => $module->id,
                    'question_file' => ($assessment['isSoftFileQuestion'] == 'OPTYS') ? 'https://drive.google.com/file/d/1PP2EuZKiihDY1wEm5IAX-g9ddiQNDMOn/view?usp=sharing' : null,
                    'answer' => ($assessment['answer_type'] == 'ANSMC') ? 'ABCDEABCDEABCDE' : null
                ]);
            }
        }
    }
}
