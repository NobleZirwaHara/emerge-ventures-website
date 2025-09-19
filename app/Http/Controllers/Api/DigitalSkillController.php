<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DigitalSkill;
use Illuminate\Http\Request;

class DigitalSkillController extends Controller
{
    public function show(DigitalSkill $skill)
    {
        return response()->json($skill);
    }
}
