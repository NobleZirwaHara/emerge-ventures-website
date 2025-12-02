<?php

namespace App\Mail;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\MessageConverter;

class PlunkTransport extends AbstractTransport
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;

    public function __construct(string $apiKey, string $apiUrl = 'https://api.useplunk.com')
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
        $this->apiUrl = rtrim($apiUrl, '/');

        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        
        $recipients = $this->getRecipients($email->getTo());
        
        $payload = [
            'to' => $recipients[0], // Plunk expects a single email string
            'subject' => $email->getSubject(),
            'body' => $email->getHtmlBody() ?: $email->getTextBody(),
        ];

        // Don't set custom from address - use Plunk's default to avoid domain verification issues

        try {
            $response = $this->client->post($this->apiUrl . '/v1/send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Plunk API returned status: ' . $response->getStatusCode());
            }
        } catch (RequestException $e) {
            throw new \Exception('Failed to send email via Plunk: ' . $e->getMessage());
        }
    }

    public function __toString(): string
    {
        return 'plunk';
    }

    private function getRecipients($addresses): array
    {
        $recipients = [];
        foreach ($addresses as $address) {
            $recipients[] = $address->getAddress();
        }
        return $recipients;
    }
}