<?php

namespace App\Http\Controllers;

use App\Services\PlunkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    protected $plunkService;

    public function __construct(PlunkService $plunkService)
    {
        $this->plunkService = $plunkService;
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.'
            ], 422);
        }

        try {
            $email = $validator->validated()['email'];
            
            // Track newsletter subscription event
            $this->plunkService->trackEvent('newsletter-subscription', $email, [
                'source' => 'website',
                'page' => $request->header('referer', 'unknown'),
                'timestamp' => now()->toISOString()
            ], true); // subscribed = true for newsletter

            // Send welcome email to subscriber
            $this->plunkService->sendEmail(
                $email,
                'Welcome to Emerge Ventures Newsletter!',
                $this->buildWelcomeEmailBody(),
                ['subscribed' => true]
            );

            // Notify admin about new subscription
            $this->plunkService->sendEmail(
                config('app.admin_email'),
                'New Newsletter Subscription',
                $this->buildAdminNotificationBody($email)
            );

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! Check your email for a welcome message.'
            ]);

        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed: ' . $e->getMessage(), [
                'email' => $email ?? 'unknown'
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error processing your subscription. Please try again later.'
            ], 500);
        }
    }

    private function buildWelcomeEmailBody()
    {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='text-align: center; padding: 20px; background: linear-gradient(135deg, #007bff, #0056b3); color: white; border-radius: 10px 10px 0 0;'>
                <h1 style='margin: 0; font-size: 28px;'>Welcome to Emerge Ventures!</h1>
                <p style='margin: 10px 0 0 0; opacity: 0.9; font-size: 16px;'>Your journey to innovation starts here</p>
            </div>
            
            <div style='padding: 30px; background: #fff; border: 1px solid #dee2e6; border-top: none; border-radius: 0 0 10px 10px;'>
                <h2 style='color: #333; margin-top: 0;'>Thank you for subscribing!</h2>
                
                <p style='color: #555; line-height: 1.6; font-size: 16px;'>
                    We're excited to have you join our community of innovators, entrepreneurs, and digital enthusiasts. 
                    You'll now receive updates about:
                </p>
                
                <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                    <ul style='color: #555; line-height: 1.8; margin: 0; padding-left: 20px;'>
                        <li>Latest digital skills training programs</li>
                        <li>Entrepreneurship opportunities and support</li>
                        <li>Co-working space updates and events</li>
                        <li>Success stories from our community</li>
                        <li>Exclusive offers and early access to new services</li>
                    </ul>
                </div>
                
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='" . config('app.url') . "' style='display: inline-block; padding: 12px 30px; background: #007bff; color: white; text-decoration: none; border-radius: 25px; font-weight: bold;'>
                        Explore Our Services
                    </a>
                </div>
                
                <div style='background: #e3f2fd; padding: 15px; border-radius: 5px; border-left: 4px solid #007bff;'>
                    <p style='margin: 0; color: #555;'>
                        <strong>Stay Connected:</strong><br>
                        Follow us on social media for daily updates and behind-the-scenes content!
                    </p>
                </div>
            </div>
            
            <div style='text-align: center; padding: 20px; color: #6c757d; font-size: 12px;'>
                <p style='margin: 0;'>
                    Emerge Hub - Mzuzu | Kwawala House, First Floor<br>
                    P.O. Box 20094, Mzuzu, Malawi<br>
                    <a href='mailto:hello@emerge-ventures.org' style='color: #007bff;'>hello@emerge-ventures.org</a>
                </p>
                <p style='margin: 10px 0 0 0;'>
                    <a href='#' style='color: #6c757d; font-size: 11px;'>Unsubscribe</a>
                </p>
            </div>
        </div>
        ";
    }

    private function buildAdminNotificationBody($email)
    {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <h2 style='color: #333; border-bottom: 2px solid #28a745; padding-bottom: 10px;'>
                New Newsletter Subscription
            </h2>
            
            <div style='background: #d4edda; padding: 20px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #28a745;'>
                <h3 style='color: #155724; margin-top: 0;'>Subscriber Details</h3>
                <p><strong>Email:</strong> <a href='mailto:{$email}'>{$email}</a></p>
                <p><strong>Subscription Date:</strong> " . now()->format('F j, Y \a\t g:i A') . "</p>
                <p><strong>Source:</strong> Website Newsletter Form</p>
            </div>
            
            <div style='margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 5px; font-size: 12px; color: #6c757d;'>
                <p>This notification was automatically generated by the Emerge Ventures website.</p>
            </div>
        </div>
        ";
    }
}