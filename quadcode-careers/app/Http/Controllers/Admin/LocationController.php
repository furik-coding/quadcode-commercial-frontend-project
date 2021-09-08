<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class LocationController extends ModuleController
{
    protected $moduleName = 'locations';

    protected $indexOptions = [
        'reorder' => true,
    ];

    protected $indexColumns = [
        'title' => [ // field column
            'title' => 'Title',
            'field' => 'title',
        ],
        'job_place' => [ // field column
            'title' => 'Country',
            'field' => 'country',
        ],
    ];
}
