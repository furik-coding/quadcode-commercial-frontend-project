<?php

return [
    'pages' => [
        'title' => 'Pages',
        'module' => true
    ],
    'locations' => [
        'title' => 'Locations',
        'module' => true
    ],
    'categories' => [
        'title' => 'Categories',
        'module' => true
    ],
    'teams' => [
        'title' => 'Team',
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
