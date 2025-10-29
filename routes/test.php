<?php

use App\Services\PlunkService;
use Illuminate\Support\Facades\Route;

// Test route to verify Plunk integration (remove in production)
Route::get('/test-plunk', function (PlunkService $plunkService) {
    try {
        // Test tracking an event
        $trackResult = $plunkService->trackEvent('test-event', 'test@example.com', [
            'test_data' => 'This is a test',
            'timestamp' => now()->toISOString()
        ]);

        // Test sending an email
        $emailResult = $plunkService->sendEmail(
            'test@example.com',
            'Test Email from Laravel',
            '<h1>Test Email</h1><p>This is a test email sent from Laravel using Plunk API.</p>'
        );

        return response()->json([
            'plunk_configured' => true,
            'api_key_set' => !empty(config('services.plunk.secret_key')),
            'track_result' => $trackResult,
            'email_result' => $emailResult,
            'admin_email' => config('app.admin_email'),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'plunk_configured' => false,
            'api_key_set' => !empty(config('services.plunk.secret_key')),
            'admin_email' => config('app.admin_email'),
        ], 500);
    }
});