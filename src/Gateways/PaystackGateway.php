<?php

namespace Scaffold\Gateways;

use GuzzleHttp\Client;
use Scaffold\Contracts\PaymentGatewayInterface;

class PaystackGateway implements PaymentGatewayInterface
{
    protected $secret;

    protected $client;

    public function __construct(array $config)
    {
        $this->secret = $config['secret'];

        // Guzzle HTTP client
        $this->client = new Client([
            'base_uri' => $config['base_uri'],
            'headers' => [
                'Authorization' => 'Bearer '.$this->secret,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Charge a customer
     *
     * @param  array  $data  ['email' => ..., 'amount' => ...]
     * @return array Response from Paystack
     */
    public function charge(array $data)
    {
        try {
            $response = $this->client->post('transaction/initialize', [
                'json' => [
                    'email' => $data['email'],
                    'amount' => $data['amount'] * 100,
                ],
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            return $body;
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify a transaction
     *
     * @return array
     */
    public function verify(string $reference)
    {
        try {
            $response = $this->client->get("transaction/verify/{$reference}");
            $body = json_decode($response->getBody()->getContents(), true);

            return $body;
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
