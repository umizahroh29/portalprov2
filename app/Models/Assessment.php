<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use Uuid;

    protected $fillable = ['practicum_id', 'name', 'percentage', 'duration', 'question_count', 'answer_type', 'isSoftFileQuestion', 'isOnline'];

    public function practicum()
    {
        return $this->belongsTo(Practicum::class);
    }

    public function module_assessments()
    {
        return $this->hasMany(ModuleAssessment::class);
    }
}
