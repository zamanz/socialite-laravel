<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    
    'facebook' => [
        'client_id' => '760877408090298',
        'client_secret' => '4dbc1aa2c37fe0f72c539f0ca674f885',
        'redirect' => 'https://socialite-laravel.test/facebook/callback',
    ],
    
    'github' => [
        'client_id' => 'ffb951f2d0ccb670e7d7',
        'client_secret' => 'e2a180f4072a6fedad10fe416328432cdbc3b0a0',
        'redirect' => 'https://socialite-laravel.test/github/callback',
    ],

    'google' => [
        'client_id' => '847620353260-38r319meqsnje7aqe458sqop4c4auf8t.apps.googleusercontent.com',
        'client_secret' => '5RXJOxU154SgQqlYuyzBjljH',
        'redirect' => 'http://localhost/socialite-laravel/google/callback',
    ],

];
