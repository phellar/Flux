<?php

namespace Scaffold;

use Scaffold\Gateways\PaystackGateway;
use Scaffold\Gateways\FlutterwaveGateway;

class PaymentManager
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function gateway(string $name)
    {
        return match(strtolower($name)) {
            'paystack' => new PaystackGateway(config('scaffold.paystack')),
            'flutterwave' => new FlutterwaveGateway(config('scaffold.flutterwave')),
            default => throw new \Exception("Gateway {$name} not supported"),
        };
    }
}
