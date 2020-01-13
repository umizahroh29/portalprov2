<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use Uuid;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
