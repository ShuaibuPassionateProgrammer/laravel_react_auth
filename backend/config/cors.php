<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', '*'],

    'allowed_methods' => ['*'],  // Allows all HTTP methods

    //'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],  // Allow all origins (you can restrict this later if needed)

    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000'), "localhost:3000"],  // Allow all origins (you can restrict this later if needed)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Allow all headers (you can also restrict this later)

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,  // Make sure this is set to true if you're using cookies or sessions

];
