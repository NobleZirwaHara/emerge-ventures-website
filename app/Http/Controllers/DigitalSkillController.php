<?php

namespace App\Http\Controllers;

use App\Models\DigitalSkill;
use App\Models\Setting;
use Illuminate\Http\Request;

class DigitalSkillController extends Controller
{
    public function index()
    {
        $digitalSkills = DigitalSkill::where('is_active', true)
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $applicationsEnabled = Setting::get('digital_skills_applications_enabled', true);

        return view('digital-skills', compact('digitalSkills', 'applicationsEnabled'));
    }
}