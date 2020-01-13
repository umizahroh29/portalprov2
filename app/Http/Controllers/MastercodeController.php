<?php

namespace App\Http\Controllers;

use App\Models\Mastercode;
use Illuminate\Http\Request;

class MastercodeController extends Controller
{
    public function getAnswerTypesData()
    {
        return Mastercode::where('parent_code', 'ANS')->get();
    }
}
