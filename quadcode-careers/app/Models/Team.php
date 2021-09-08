<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class Team extends Model implements Sortable
{
    use HasTranslation, HasMedias, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'description',
        'job_place',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'job_place',
        'active',
    ];

    public $mediasParams = [
        'cover' => [
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 480 / 570,
                    'minValues' => [
                        'width' => 480,
                        'height' => 570,
                    ],
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 350 / 370,
                    'minValues' => [
                        'width' => 350,
                        'height' => 370,
                    ],
                ],
            ],
        ],
    ];
}
