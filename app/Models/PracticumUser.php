<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class PracticumUser extends Model
{
    use Uuid;

    protected $fillable = ['practicum_id', 'user_nim', 'assistant_code', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function practicum()
    {
        return $this->belongsTo(Practicum::class);
    }
}
