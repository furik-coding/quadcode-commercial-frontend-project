<?php


namespace App\Repositories;


use App\Api\Huntflow;
use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class VacancyRepository
{
    protected $model;
    protected $huntflow;
    protected $locationRep;
    protected $categoryRep;

    public function __construct(Vacancy $model, Huntflow $huntflow, LocationRepository $locationRep, CategoryRepository $categoryRep)
    {
        $this->model = $model;
        $this->huntflow = $huntflow;
        $this->locationRep = $locationRep;
        $this->categoryRep = $categoryRep;
    }

    /**
     * Truncate vacancy table
     */
    public function truncate()
    {
        $this->model::query()->truncate();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function forSlug($slug)
    {
        return $this->model::where('id', $slug)->first();
    }

    public static function getCount(): int
    {
        return Vacancy::query()->count();
    }

    public static function getSitemapData()
    {
        return Vacancy::query()->get();
    }

    /**
     * Get stats for given search query
     * @return array
     */
    public function getPositionStats(Builder $vacancies)
    {
        return [
            'positions' => $vacancies->count('id'),
            'locations' => $vacancies->count(DB::raw('DISTINCT location_id')),
            'categories' => $vacancies->count(DB::raw('DISTINCT category_id')),
        ];
    }
    /**
     * @param array $vacancy
     * @return bool
     */
    public function updateFromHuntflow(array $vacancy): bool
    {
        $hf = $this->huntflow;
        $now = Carbon::now();

        if (!(isset($vacancy['visiable_position']) && $hf->translateBool($vacancy['visiable_position']))) {
            // do not import if position is not visible
            return false;
        }

        $this->model::query()->insert([
            'id' => $vacancy['id'],
            'created_at' => $now,
            'updated_at' => $now,
            'show_position' => $hf->translateBool($vacancy['visiable_position']),
            'position' => $vacancy['position'],
            'show_title' => $hf->translateBool($vacancy['visiable_title_position']),
            'title' => $vacancy['vacancy_title'],
            'show_money' => $hf->translateBool($vacancy['visiable_money']),
            'money' => $vacancy['money'],
            'state' => $vacancy['state'],
            'created_original' => Carbon::parse($vacancy['created']),
            'is_hidden' => $vacancy['hidden'],
            'body' => $vacancy['body'],
            'show_requirements' => $hf->translateBool($vacancy['visiable_requirements']),
            'requirements' => $vacancy['requirements_title'], // Huntflow returns content in title and title in content
            'requirements_title' => $vacancy['requirements'],
            'show_conditions' => $hf->translateBool($vacancy['visiable_conditions']),
            'conditions' => $vacancy['conditions_title'], // Huntflow returns content in title and title in content
            'conditions_title' => $vacancy['conditions'],
            'deadline' => $vacancy['deadline'] ? Carbon::parse($vacancy['deadline']) : null,
            'applicants_to_hire' => $vacancy['applicants_to_hire'],
            'show_team' => $hf->translateBool($vacancy['visiable_team']),
            'team_title' => $vacancy['team_title'],
            'show_location' => $hf->translateBool($vacancy['visiable_location_vacancy']),
            'location_id' => $vacancy['location_title'],
            'location_title' => $this->locationRep->getNameById($vacancy['location_title']),
            'show_category' => $hf->translateBool($vacancy['visiable_category_vacancy']),
            'category_id' => $vacancy['category_title'],
            'category_title' => $this->categoryRep->getNameById($vacancy['category_title']),
            'show_type_of_work' => $hf->translateBool($vacancy['visiable_type_of_work']),
            'type_of_work_id' => $vacancy['type_of_work'],
            'type_of_work_title' => $this->model->getType($vacancy['type_of_work']),
            'show_about_team' => $hf->translateBool($vacancy['visiable_about_team']),
            'about_team' => $vacancy['about_team'],
            'show_tasks' => $hf->translateBool($vacancy['visiable_tasks']),
            'tasks' => $vacancy['tasks'],
        ]);

        return true;
    }
}
