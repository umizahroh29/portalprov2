<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use Uuid;

    protected $fillable = ['practicum_id', 'name', 'module_link', 'video_link', 'input_grade_duedate', 'grade_publish_date'];

    public function practicum()
    {
        return $this->belongsTo(Practicum::class);
    }

    public function module_assessments()
    {
        return $this->hasMany(ModuleAssessment::class);
    }
}
