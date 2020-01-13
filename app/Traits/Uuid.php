<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Uuid
{
    public static function bootUuid()
    {
        static::creating(function (Model $model) {
            $uuid = (string)Str::orderedUuid();
            $model[$model->getKeyName()] = $uuid;
        });
    }

    public function getIncrementing()
    {
        return false;
    }
}
