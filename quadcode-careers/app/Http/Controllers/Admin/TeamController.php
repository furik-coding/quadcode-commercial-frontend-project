<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class TeamController extends ModuleController
{
    protected $moduleName = 'teams';

    protected $indexOptions = [
        'permalink' => false,
        'reorder' => true,
    ];

    protected $indexColumns = [
        'image' => [
            'thumb' => true, // image column
            'variant' => [
                'role' => 'cover',
                'crop' => 'default',
            ],
        ],
        'title' => [ // field column
            'title' => 'Title',
            'field' => 'title',
        ],
        'job_place' => [ // field column
            'title' => 'Position',
            'field' => 'job_place',
        ],
    ];
}
