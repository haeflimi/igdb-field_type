<?php

use Illuminate\Support\Facades\Config;

return [
    'api_key' => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config' => [
            'default_value' => Config::get('igdb.key')
        ]
    ],
    'api_url' => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
        'config' => [
            'default_value' => Config::get('igdb.url')
        ]
    ],
];
