<?php 
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ChatGPTService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function sendMessage($message, $model = 'gpt-3.5-turbo')
    {
        try {
            $response = $this->client->request('POST', 'chat/completions', [
                'json' => [
                    'model' => $model,
                    'messages' => [['role' => 'user', 'content' => $message]]
                ]
            ]);

            // Process and return the response
            $body = json_decode($response->getBody(), true);
            return $body['choices'][0]['message']['content'];

        } catch (RequestException $e) {
            // Handle exceptions or errors as necessary
            throw new \Exception('Failed to send message: ' . $e->getMessage());
        }
    }
}