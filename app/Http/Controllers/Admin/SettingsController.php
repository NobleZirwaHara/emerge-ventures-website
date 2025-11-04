<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function toggleDigitalSkillsApplications(Request $request)
    {
        $enabled = $request->input('enabled', false);
        
        Setting::set(
            'digital_skills_applications_enabled',
            $enabled ? 'true' : 'false',
            'boolean',
            'Controls whether users can apply for digital skills training programs'
        );

        return response()->json([
            'success' => true,
            'enabled' => $enabled,
            'message' => $enabled ? 'Digital skills applications enabled' : 'Digital skills applications disabled'
        ]);
    }
}
