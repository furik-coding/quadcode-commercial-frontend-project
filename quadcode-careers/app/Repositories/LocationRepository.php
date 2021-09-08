<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Location;
use App\Models\Vacancy;
use Illuminate\Support\Facades\DB;

class LocationRepository extends ModuleRepository
{
    use HandleTranslations, HandleSlugs, HandleMedias, HandleRevisions, HandleFiles;

    public function __construct(Location $model)
    {
        $this->model = $model;
    }

    public static function getPublicData()
    {
        return Location::withActiveTranslations()->published()->OrderByTranslation('title', 'asc')->get();
    }

    public static function getHeroData()
    {
        return Location::withActiveTranslations()->published()->orderBy('position', 'asc')->get();
    }

    public static function getSitemapData()
    {
        return Location::withActiveTranslations()->published()->get();
    }

    public function getListByIds($ids)
    {
        return $this->model::withActiveTranslations()
            ->published()
            ->whereIn('id_external', $ids)
            ->get()
            ->keyBy('id_external');
    }


    public static function getCount(): int
    {
        return Location::where('published', true)->count();
    }

    /**
     * Get category count for given location
     * @param Location $location
     * @return mixed
     */
    public function getCategoryCount(Location $location)
    {
        return Vacancy::query()
            ->selectRaw('count(DISTINCT category_id) as cnt')
            ->where('location_id', $location->id_external)
            ->groupBy('location_id')
            ->value('cnt');
    }

    /**
     * @param int $id
     * @return string
     */
    public function getNameById(int $id): string
    {
        $record = $this->model->withActiveTranslations()->where('id_external', $id)->first();
        return $record->title . ', ' . $record->country;
    }

    /**
     * @param array $location array from huntflow
     * @return bool
     */
    public function updateFromHuntflow(array $location): bool
    {
        /*
            "id": 6648,
            "name": "Administrative positions",
            "parent": null,
            "foreign": "1",
            "active": true,
            "meta": null,
            "deep": 0,
            "order": 0
        */
        if (Location::where('id_external', $location['id'])->exists()) {
            return false;
        }

        $slug = \Str::slug($location['name']);

        $this->create([
            'id_external' => $location['id'],
            'languages' => [
                [
                    'shortlabel' => 'EN',
                    'value' => 'en',
                    'disabled' => false,
                    'published' => true,
                ],[
                    'shortlabel' => 'RU',
                    'value' => 'ru',
                    'disabled' => false,
                    'published' => false,
                ],
            ],
            'title' => ['en' => $location['name']],
            'slug' => ['en' => $slug, 'ru' => $slug],
        ]);
        return true;
    }

    /**
     * @return int
     */
    public function updateVacancyCount()
    {
        return DB::update('WITH count_info AS (
            SELECT locations."id", (SELECT COUNT(id) FROM vacancies WHERE location_id=locations.id_external AND show_location=true) as cnt FROM locations)
            UPDATE locations
            SET count_positions=count_info.cnt
            FROM count_info
            WHERE locations.id = count_info.id');
    }
}
