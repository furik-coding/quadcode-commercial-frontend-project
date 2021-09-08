<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends ModuleRepository
{
    use HandleTranslations, HandleSlugs, HandleMedias;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public static function getSitemapData()
    {
        return Category::withActiveTranslations()->published()->get();
    }

    public function getListByIds($ids)
    {
        return $this->model::withActiveTranslations()
            ->published()
            ->whereIn('id_external', $ids)
            ->get()
            ->keyBy('id_external');
    }

    public static function getPublicData()
    {
        return Category::withActiveTranslations()->published()->OrderByTranslation('title', 'asc')->get();
    }


    public static function getTopData()
    {
        return Category::withActiveTranslations()->published()->orderBy('count_positions', 'desc')->limit(6)->get();
    }

    /**
     * @param int $id
     * @return string
     */
    public function getNameById(int $id): string
    {
        $record = $this->model->withActiveTranslations()->where('id_external', $id)->first();
        return $record->title;
    }

    /**
     * @return int
     */
    public static function getCount(): int
    {
        return Category::where('published', true)->count();
    }

    /**
     * Get location count for given category
     * @param Category $category
     * @return mixed
     */
    public function getLocationCount(Category $category)
    {
        return Vacancy::query()
            ->selectRaw('count(DISTINCT location_id) as cnt')
            ->where('category_id', $category->id_external)
            ->groupBy('category_id')
            ->value('cnt');
    }

    /**
     * @param array $category array from huntflow
     * @return bool
     */
    public function updateFromHuntflow(array $category): bool
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
        if (Category::where('id_external', $category['id'])->exists()) {
            return false;
        }

        $slug = \Str::slug($category['name']);

        $this->create([
            'id_external' => $category['id'],
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
            'title' => ['en' => $category['name']],
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
            SELECT categories."id", (SELECT COUNT(id) FROM vacancies WHERE category_id=categories.id_external AND show_category=true) as cnt FROM categories)
            UPDATE categories
            SET count_positions=count_info.cnt
            FROM count_info
            WHERE categories.id = count_info.id');
    }
}
