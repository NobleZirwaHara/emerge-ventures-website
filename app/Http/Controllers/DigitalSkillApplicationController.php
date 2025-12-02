<?php

namespace App\Http\Controllers;

use App\Models\DigitalSkill;
use App\Models\DigitalSkillApplication;
use App\Models\Setting;
use App\Mail\DigitalSkillApplicationReceived;
use App\Mail\DigitalSkillApplicationSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DigitalSkillApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Check if applications are enabled
        $applicationsEnabled = Setting::get('digital_skills_applications_enabled', true);
        
        if (!$applicationsEnabled) {
            return response()->json([
                'success' => false,
                'message' => 'Applications are currently closed. Please check back later.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'program' => 'required|string|exists:digital_skills,slug',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            \Log::info('Validation failed for digital skills application', [
                'errors' => $validator->errors(),
                'input' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Please check your input and try again.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Find the digital skill
            $digitalSkill = DigitalSkill::where('slug', $request->program)->first();
            
            if (!$digitalSkill) {
                \Log::warning('Digital skill not found', ['slug' => $request->program]);
                return response()->json([
                    'success' => false,
                    'message' => 'The selected program does not exist.'
                ], 404);
            }
            
            if (!$digitalSkill->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'The selected program is not currently available.'
                ], 404);
            }

            // Check if user has already applied for this program
            $existingApplication = DigitalSkillApplication::where('email', $request->email)
                ->where('digital_skill_id', $digitalSkill->id)
                ->whereIn('status', ['pending', 'approved'])
                ->first();

            if ($existingApplication) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already applied for this program. Please check your email for updates.'
                ], 409);
            }

            // Create the application
            $application = DigitalSkillApplication::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'digital_skill_id' => $digitalSkill->id,
                'message' => $request->message,
                'status' => 'pending',
                'applied_at' => now(),
            ]);

            // Load the digital skill relationship for emails
            $application->load('digitalSkill');

            // Send confirmation email to applicant
            try {
                \Log::info('Attempting to send confirmation email to: ' . $application->email);
                Mail::to($application->email)->send(new DigitalSkillApplicationSubmitted($application));
                \Log::info('Confirmation email sent successfully to: ' . $application->email);
            } catch (\Exception $e) {
                // Log the error but don't fail the application
                \Log::error('Failed to send application confirmation email: ' . $e->getMessage(), [
                    'email' => $application->email,
                    'application_id' => $application->id
                ]);
            }

            // Send notification email to admin
            try {
                $adminEmail = env('ADMIN_EMAIL', env('APP_ADMIN_EMAIL', 'admin@example.com'));
                \Log::info('Attempting to send admin notification to: ' . $adminEmail);
                Mail::to($adminEmail)->send(new DigitalSkillApplicationReceived($application));
                \Log::info('Admin notification sent successfully to: ' . $adminEmail);
            } catch (\Exception $e) {
                // Log the error but don't fail the application
                \Log::error('Failed to send admin notification email: ' . $e->getMessage(), [
                    'admin_email' => $adminEmail ?? 'not_set',
                    'application_id' => $application->id
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully! We will contact you soon.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Digital skill application error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    public function index()
    {
        $applications = DigitalSkillApplication::with('digitalSkill')
            ->orderBy('applied_at', 'desc')
            ->paginate(15);

        return view('admin.digital-skill-applications.index', compact('applications'));
    }

    public function show(DigitalSkillApplication $application)
    {
        $application->load('digitalSkill');
        return view('admin.digital-skill-applications.show', compact('application'));
    }

    public function updateStatus(Request $request, DigitalSkillApplication $application)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
}
