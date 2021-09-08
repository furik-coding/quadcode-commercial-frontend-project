<?php

return [
    'settings' => true,

    'dashboard' => [
        'modules' => [
            'pages' => [
                'name' => 'pages',
                'count' => true,
                'create' => true,
                'activity' => true,
                'draft' => true,
                'search' => true,
                'search_fields' => ['title', 'description']
            ],
            'categories' => [
                'name' => 'categories',
                'count' => true,
                'create' => false,
                'activity' => true,
                'draft' => true,
                'search' => true,
                'search_fields' => ['title', 'description']
            ],
        ],


//        'analytics' => [
//            'enabled' => true,
//            'service_account_credentials_json' => storage_path('app/analytics/service-account-credentials.json'),
//        ],
    ],

    'block_editor' => [
        'blocks' => [
            'quote' => [
                'title' => 'Quote',
                'icon' => 'text',
                'component' => 'a17-block-quote',
            ],
            'hero' => [
                'title' => 'Hero',
                'icon' => 'revision-single',
                'component' => 'a17-block-hero',
            ],
            'hero_index' => [
                'title' => 'Hero Index',
                'icon' => 'revision-single',
                'component' => 'a17-block-hero_index',
            ],
            'hero_locations' => [
                'title' => 'Hero Locations',
                'icon' => 'revision-single',
                'component' => 'a17-block-hero_locations',
            ],
            'cta' => [
                'title' => 'CTA',
                'icon' => 'text',
                'component' => 'a17-block-cta',
            ],
            'speakers' => [
                'title' => 'Speakers',
                'icon' => 'text',
                'component' => 'a17-block-speakers',
            ],
            'image' => [
                'title' => 'Image',
                'icon' => 'image',
                'component' => 'a17-block-image',
            ],
            'hot_categories' => [
                'title' => 'Hot categories',
                'icon' => 'media-grid',
                'component' => 'a17-block-hot_categories',
            ],
            'categories' => [
                'title' => 'Categories',
                'icon' => 'media-grid',
                'component' => 'a17-block-categories',
            ],
            'team' => [
                'title' => 'Team',
                'icon' => 'media-grid',
                'component' => 'a17-block-team',
            ],
            'team_stats' => [
                'title' => 'Team Stats',
                'icon' => 'media-grid',
                'component' => 'a17-block-team_stats',
            ],
            'features_list' => [
                'title' => 'Features',
                'icon' => 'media-grid',
                'component' => 'a17-block-features_list',
            ],
            'map' => [
                'title' => 'Map',
                'icon' => 'media-grid',
                'component' => 'a17-block-map',
            ],
            'video' => [
                'title' => 'Video',
                'icon' => 'media-image',
                'component' => 'a17-block-video',
            ],
            'gallery2' => [
                'title' => 'Gallery',
                'icon' => 'media-flex-grid',
                'component' => 'a17-block-gallery2',
            ],
            'values' => [
                'title' => 'Values',
                'icon' => 'media-grid',
                'component' => 'a17-block-values',
            ],
        ],
        'crops' => [
            'image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
        ],
        'files' => ['video', 'video_full'],
        'repeaters' => [
            'team_stats_item' => [
                'title' => 'Slide',
                'trigger' => 'Add slide',
                'component' => 'a17-block-team_stats_item',
            ],
            'features_list_item' => [
                'title' => 'Feature item',
                'trigger' => 'Add feature',
                'component' => 'a17-block-features_list_item',
            ],
            'values_item' => [
                'title' => 'Values item',
                'trigger' => 'Add value',
                'component' => 'a17-block-values_item',
            ],
        ]
    ],

    'buckets' => [
        'main' => [
            'name' => 'Navigation',
            'buckets' => [
                'main_navigation' => [
                    'name' => 'Main navigation',
                    'bucketables' => [
                        [
                            'module' => 'pages',
                            'name' => 'pages',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 4,
                ],
            ],
        ],
    ],

    'bucketsRoutes' => [
        'main' => 'navigation',
    ],
];
