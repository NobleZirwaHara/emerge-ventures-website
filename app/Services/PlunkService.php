<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlunkService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.plunk.secret_key', env('PLUNK_SECRET_KEY'));
        $this->apiUrl = config('services.plunk.api_url', env('PLUNK_API_URL', 'https://api.useplunk.com'));
    }

    /**
     * Track an event in Plunk
     */
    public function trackEvent(string $event, string $email, array $data = [], bool $subscribed = true)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '/v1/track', [
                'event' => $event,
                'email' => $email,
                'subscribed' => $subscribed,
                'data' => $data,
            ]);

            if ($response->successful()) {
                Log::info('Plunk event tracked successfully', [
                    'event' => $event,
                    'email' => $email,
                    'response' => $response->json()
                ]);
                return $response->json();
            } else {
                Log::error('Failed to track Plunk event', [
                    'event' => $event,
                    'email' => $email,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception while tracking Plunk event: ' . $e->getMessage(), [
                'event' => $event,
                'email' => $email
            ]);
            return false;
        }
    }

    /**
     * Send a transactional email via Plunk
     */
    public function sendEmail(string $to, string $subject, string $body, array $options = [])
    {
        try {
            $payload = [
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
                'subscribed' => $options['subscribed'] ?? false,
            ];

            // Add optional parameters if provided
            if (isset($options['name'])) {
                $payload['name'] = $options['name'];
            }
            if (isset($options['from'])) {
                $payload['from'] = $options['from'];
            }
            if (isset($options['reply'])) {
                $payload['reply'] = $options['reply'];
            }
            if (isset($options['headers'])) {
                $payload['headers'] = $options['headers'];
            }
            if (isset($options['attachments'])) {
                $payload['attachments'] = $options['attachments'];
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '/v1/send', $payload);

            if ($response->successful()) {
                Log::info('Plunk email sent successfully', [
                    'to' => $to,
                    'subject' => $subject,
                    'response' => $response->json()
                ]);
                return $response->json();
            } else {
                Log::error('Failed to send Plunk email', [
                    'to' => $to,
                    'subject' => $subject,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception while sending Plunk email: ' . $e->getMessage(), [
                'to' => $to,
                'subject' => $subject
            ]);
            return false;
        }
    }

    /**
     * Create a contact in Plunk
     */
    public function createContact(string $email, bool $subscribed = true, array $data = [])
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '/v1/contacts', [
                'email' => $email,
                'subscribed' => $subscribed,
                'data' => $data,
            ]);

            if ($response->successful()) {
                Log::info('Plunk contact created successfully', [
                    'email' => $email,
                    'response' => $response->json()
                ]);
                return $response->json();
            } else {
                Log::error('Failed to create Plunk contact', [
                    'email' => $email,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception while creating Plunk contact: ' . $e->getMessage(), [
                'email' => $email
            ]);
            return false;
        }
    }

    /**
     * Get all contacts from Plunk
     */
    public function getContacts()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->get($this->apiUrl . '/v1/contacts');

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to get Plunk contacts', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception while getting Plunk contacts: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get contact count from Plunk
     */
    public function getContactCount()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->get($this->apiUrl . '/v1/contacts/count');

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to get Plunk contact count', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception while getting Plunk contact count: ' . $e->getMessage());
            return false;
        }
    }
}