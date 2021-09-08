<?php

return [
    'pages' => [
        'title' => 'Pages',
        'module' => true
    ],
    'navigation' => [
        'title' => 'Navigation',
        'route' => 'admin.navigation.main',
    ],
    'settings' => [
        'title' => 'Settings',
        'route' => 'admin.settings',
        'params' => ['section' => 'site'],
        'primary_navigation' => [
            'site' => [
                'title' => 'Site settings',
                'route' => 'admin.settings',
                'params' => ['section' => 'site']
            ],
            'social' => [
                'title' => 'Social links',
                'route' => 'admin.settings',
                'params' => ['section' => 'social']
            ],
        ]
    ],
];
