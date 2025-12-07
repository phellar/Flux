<?php

namespace Scaffold\Gateways;

use Scaffold\Contracts\PaymentGatewayInterface;

class FlutterwaveGateway implements PaymentGatewayInterface
{
    protected $secret;

    public function __construct($config)
    {
        $this->secret = $config['secret'];
    }

    public function charge(array $data)
    {
        //Flutterwave charge API call
    }

    public function verify(string $reference)
    {
        // Flutterwave verify API call
    }
}
