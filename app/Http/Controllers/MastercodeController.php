<?php

namespace App\Http\Controllers;

use App\Models\Mastercode;

class MastercodeController extends Controller
{
    public function getAnswerTypesData()
    {
        return Mastercode::where('parent_code', 'ANS')->get();
    }
}
