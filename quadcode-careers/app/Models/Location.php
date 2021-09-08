<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Helpers\CollectionHelper;

/**
 * @property mixed count_positions
 */
class Location extends Model implements Sortable
{
    use HasTranslation, HasSlug, HasMedias, HasRevisions, HasPosition, HasFiles;

    protected $fillable = [
        'published',
        'title',
        'title_prepositional',
        'description',
        'position',
        'id_external',
        'country',
        'about_office',
        'map_coords',
        'count_positions',
    ];

    public $translatedAttributes = [
        'title',
        'title_prepositional',
        'description',
        'active',
        'country',
        'about_office',
    ];

    public $slugAttributes = [
        'title',
    ];

    public $fileParams = ['video'];

    public $mediasParams = [
        'cover' => [
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
        'video_poster' => [
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
    ];

    /**
     * Get Vacancy count
     * @return int
     */
    public function getVacancyCount(): int
    {
        if (!$this->count_positions) {
            return 0;
        }
        return $this->count_positions;
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getVacancyList()
    {
        $vacancies = $this->vacancies->where('show_location', true);

        $pageSize = 10;

        return CollectionHelper::paginate($vacancies, $pageSize);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, 'location_id', 'id_external');
    }
}
