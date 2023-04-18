<?php

return [
    'roles' => [
        'bod' => 'bod',
        'employee' => 'employee',
    ],
    'uninterruptible_roles' => [
        'bod',
    ],
    'active_status' => ['no', 'yes'],
    'countries_not_included' => ['Indonesia'],
    'country_indonesia' => 'Indonesia',
    'private_api_middleware' => [
        'route_except_contains' => [
            'helper',
            'datatable',
        ],
    ],
];
