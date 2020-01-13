<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use Uuid;

    protected $fillable = ['module_assessment_id', 'user_nim', 'assistant_code', 'answer', 'answer_file', 'token', 'grade'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_nim', 'nim');
    }

    public function module_assessment()
    {
        return $this->belongsTo(ModuleAssessment::class);
    }
}
