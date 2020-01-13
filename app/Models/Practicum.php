<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Practicum extends Model
{
    use Uuid;

    protected $fillable = ['name', 'year', 'activestatus'];

    public function users()
    {
        return $this->hasMany(PracticumUser::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function status()
    {
        return $this->belongsTo(Mastercode::class, 'activestatus', 'code');
    }
}
