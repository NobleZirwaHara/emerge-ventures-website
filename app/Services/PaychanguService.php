<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaychanguService
{
    protected $secretKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->secretKey = config('services.paychangu.secret');
        $this->baseUrl = 'https://api.paychangu.com';
    }

    public function initiatePayment(array $data)
    {
        $payload = [
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'callback_url' => route('payment.callback'),
            'return_url' => route('payment.return'),
            'tx_ref' => $data['tx_ref'],
            'customization' => [
                'title' => 'Emerge Ventures Store Purchase',
                'description' => 'Payment for order ' . $data['tx_ref'],
            ],
        ];

        $response = Http::withoutVerifying()
            ->withToken($this->secretKey)
            ->acceptJson()
            ->post($this->baseUrl . '/payment', $payload);

        return $response->json();
    }

    public function verifyPayment($txRef)
    {
        $response = Http::withoutVerifying()
            ->withToken($this->secretKey)
            ->acceptJson()
            ->get($this->baseUrl . '/verify-payment/' . $txRef);

        return $response->json();
    }
}
