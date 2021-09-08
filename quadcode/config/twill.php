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
        ],
    ],

    'block_editor' => [
        'blocks' => [
            'hero' => [
                'title' => 'Hero',
                'icon' => 'revision-single',
                'component' => 'a17-block-hero',
            ],
            'why_quadcode' => [
                'title' => 'Why quadcode',
                'icon' => 'revision-single',
                'component' => 'a17-block-why_quadcode',
            ],
            'solid_set' => [
                'title' => 'Solid Set',
                'icon' => 'revision-single',
                'component' => 'a17-block-solid_set',
            ],
            'new_era' => [
                'title' => 'New Era',
                'icon' => 'revision-single',
                'component' => 'a17-block-new_era',
            ],
            'get_in_touch' => [
                'title' => 'Get in Touch',
                'icon' => 'revision-single',
                'component' => 'a17-block-get_in_touch',
            ],
            'text_center' => [
                'title' => 'Text center',
                'icon' => 'text',
                'component' => 'a17-block-text_center',
            ],
            'tech' => [
                'title' => 'Tech',
                'icon' => 'revision-single',
                'component' => 'a17-block-tech',
            ],
            'customization' => [
                'title' => 'Customization',
                'icon' => 'revision-single',
                'component' => 'a17-block-customization',
            ],
            'cross_platform' => [
                'title' => 'Cross Platform',
                'icon' => 'revision-single',
                'component' => 'a17-block-cross_platform',
            ],
            'developed' => [
                'title' => 'Developed by',
                'icon' => 'revision-single',
                'component' => 'a17-block-developed',
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
            'image2' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 0,
                    ],
                ],
            ],
        ],
        'files' => ['video', 'icon'],
        'repeaters' => [
            'why_quadcode_item' => [
                'title' => 'Features',
                'trigger' => 'Add feature',
                'component' => 'a17-block-why_quadcode_item',
            ],
            'tech_item' => [
                'title' => 'Features',
                'trigger' => 'Add feature',
                'component' => 'a17-block-tech_item',
            ],
            'cross_platform_item' => [
                'title' => 'Features',
                'trigger' => 'Add feature',
                'component' => 'a17-block-cross_platform_item',
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
