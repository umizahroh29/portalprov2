<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class ModuleAssessment extends Model
{
    use Uuid;

    protected $fillable = ['assessment_id', 'module_id', 'question_type', 'question_file', 'answer'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
