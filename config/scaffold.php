<?php

// config for Phellar/Scaffold
return [
    'paystack' => [
        'secret' => env('PAYSTACK_SECRET'),
        'public' => env('PAYSTACK_PUBLIC'),
        'base_uri' => env('PAYSTACK_BASE_URI', 'https://api.paystack.co/'),
    ],

    'flutterwave' => [
        'secret' => env('FLUTTERWAVE_SECRET'),
        'public' => env('FLUTTERWAVE_PUBLIC'),
        'base_uri' => env('FLUTTERWAVE_BASE_URI', 'https://api.flutterwave.com/v3/'),
    ],
];
