<?php

namespace Scaffold\Contracts;

interface PaymentGatewayInterface
{
    public function charge(array $data);
    public function verify(string $reference);
}
