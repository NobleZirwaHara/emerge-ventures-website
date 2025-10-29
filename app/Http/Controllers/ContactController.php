<?php

namespace App\Http\Controllers;

use App\Services\PlunkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    protected $plunkService;

    public function __construct(PlunkService $plunkService)
    {
        $this->plunkService = $plunkService;
    }

    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();
            
            // Track the contact event in Plunk
            $this->plunkService->trackEvent('contact-form-submission', $data['email'], [
                'name' => $data['fname'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'message' => $data['message'],
                'timestamp' => now()->toISOString()
            ]);

            // Send email to admin
            $adminEmailSent = $this->plunkService->sendEmail(
                config('app.admin_email', env('ADMIN_EMAIL')),
                'New Contact Form Submission - ' . $data['subject'],
                $this->buildAdminEmailBody($data)
            );

            // Send auto-reply to the sender
            $autoReplySent = $this->plunkService->sendEmail(
                $data['email'],
                'Thank you for contacting Emerge Ventures',
                $this->buildAutoReplyBody($data['fname'])
            );

            if ($adminEmailSent && $autoReplySent) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for your message! We\'ll get back to you within 24 hours.'
                ]);
            } else {
                throw new \Exception('Failed to send one or more emails');
            }

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again later.'
            ], 500);
        }
    }

    private function buildAdminEmailBody($data)
    {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <h2 style='color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;'>
                New Contact Form Submission
            </h2>
            
            <div style='background: #f8f9fa; padding: 20px; border-radius: 5px; margin: 20px 0;'>
                <h3 style='color: #007bff; margin-top: 0;'>Contact Details</h3>
                <p><strong>Name:</strong> {$data['fname']}</p>
                <p><strong>Email:</strong> <a href='mailto:{$data['email']}'>{$data['email']}</a></p>
                <p><strong>Phone:</strong> <a href='tel:{$data['phone']}'>{$data['phone']}</a></p>
                <p><strong>Subject:</strong> {$data['subject']}</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px;'>
                <h3 style='color: #333; margin-top: 0;'>Message</h3>
                <p style='line-height: 1.6; color: #555;'>" . nl2br(htmlspecialchars($data['message'])) . "</p>
            </div>
            
            <div style='margin-top: 20px; padding: 15px; background: #e9ecef; border-radius: 5px; font-size: 12px; color: #6c757d;'>
                <p>This message was sent from the Emerge Ventures contact form on " . now()->format('F j, Y \a\t g:i A') . "</p>
            </div>
        </div>
        ";
    }

    private function buildAutoReplyBody($name)
    {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='text-align: center; padding: 20px; background: linear-gradient(135deg, #007bff, #0056b3); color: white; border-radius: 10px 10px 0 0;'>
                <h1 style='margin: 0; font-size: 24px;'>Emerge Ventures</h1>
                <p style='margin: 5px 0 0 0; opacity: 0.9;'>Innovation • Growth • Success</p>
            </div>
            
            <div style='padding: 30px; background: #fff; border: 1px solid #dee2e6; border-top: none; border-radius: 0 0 10px 10px;'>
                <h2 style='color: #333; margin-top: 0;'>Thank you, {$name}!</h2>
                
                <p style='color: #555; line-height: 1.6;'>
                    We've received your message and appreciate you taking the time to contact us. 
                    Our team will review your inquiry and get back to you within 24 hours.
                </p>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 5px; margin: 20px 0;'>
                    <h3 style='color: #007bff; margin-top: 0; font-size: 18px;'>What happens next?</h3>
                    <ul style='color: #555; line-height: 1.6; padding-left: 20px;'>
                        <li>Our team will review your message carefully</li>
                        <li>We'll prepare a personalized response</li>
                        <li>You'll hear back from us within 24 hours</li>
                        <li>We'll schedule a follow-up if needed</li>
                    </ul>
                </div>
                
                <div style='background: #e3f2fd; padding: 15px; border-radius: 5px; border-left: 4px solid #007bff;'>
                    <p style='margin: 0; color: #555;'>
                        <strong>Need immediate assistance?</strong><br>
                        Call us at <a href='tel:+265881404393' style='color: #007bff;'>+265 881 404 393</a> 
                        or email <a href='mailto:hello@emergeventures.com' style='color: #007bff;'>hello@emergeventures.com</a>
                    </p>
                </div>
                
                <div style='margin-top: 30px; text-align: center;'>
                    <p style='color: #6c757d; margin-bottom: 10px;'>Follow us on social media:</p>
                    <div>
                        <a href='#' style='display: inline-block; margin: 0 10px; color: #007bff; text-decoration: none;'>Facebook</a>
                        <a href='#' style='display: inline-block; margin: 0 10px; color: #007bff; text-decoration: none;'>Twitter</a>
                        <a href='#' style='display: inline-block; margin: 0 10px; color: #007bff; text-decoration: none;'>LinkedIn</a>
                        <a href='#' style='display: inline-block; margin: 0 10px; color: #007bff; text-decoration: none;'>Instagram</a>
                    </div>
                </div>
            </div>
            
            <div style='text-align: center; padding: 20px; color: #6c757d; font-size: 12px;'>
                <p style='margin: 0;'>
                    Emerge Hub - Mzuzu | Kwawala House, First Floor<br>
                    P.O. Box 20094, Mzuzu, Malawi
                </p>
            </div>
        </div>
        ";
    }
}