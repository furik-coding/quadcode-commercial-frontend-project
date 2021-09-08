<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vacancy
 * @package App\Models
 *
 * @property int id
 * @property boolean show_position
 * @property string position
 * @property boolean show_title
 * @property string title
 * @property boolean show_money
 * @property string money
 * @property string state
 * @property string created_original
 * @property boolean is_hidden
 * @property string body
 * @property boolean show_requirements
 * @property string requirements
 * @property string requirements_title
 * @property boolean show_conditions
 * @property string conditions
 * @property string conditions_title
 * @property string deadline
 * @property int applicants_to_hire
 * @property boolean show_team
 * @property string team_title
 * @property boolean show_location
 * @property int location_id
 * @property string location_title
 * @property string show_category
 * @property int category_id
 * @property string category_title
 * @property boolean show_type_of_work
 * @property int type_of_work_id
 * @property string type_of_work_title
 * @property boolean show_about_team
 * @property string about_team
 * @property boolean show_tasks
 * @property string tasks
 * @property string files
 */
class Vacancy extends Model
{
    const TYPE_PARTIAL = 6665;
    const TYPE_FULL = 6666;
    const TYPE_TEMP = 6667;

    protected $table = 'vacancies';

    protected $fillable = [
        'id',
        'show_position',
        'position',
        'show_title',
        'title',
        'show_money',
        'money',
        'state',
        'created_original',
        'is_hidden',
        'body',
        'show_requirements',
        'requirements',
        'requirements_title',
        'show_conditions',
        'conditions',
        'conditions_title',
        'deadline',
        'applicants_to_hire',
        'show_team',
        'team_title',
        'show_location',
        'location_id',
        'location_title',
        'show_category',
        'category_id',
        'category_title',
        'show_type_of_work',
        'type_of_work_id',
        'type_of_work_title',
        'show_about_team',
        'about_team',
        'show_tasks',
        'tasks',
        'files',
    ];

    protected static $type = [
        self::TYPE_PARTIAL => 'Part time',
        self::TYPE_FULL => 'Full time',
        self::TYPE_TEMP => 'Temporary',
    ];

    /**
     * @param $typeId
     * @return string
     */
    public function getType($typeId): string
    {
        return self::$type[$typeId];
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getLocationTitle(): string
    {
        if (!$this->show_location) {
            return '';
        }
        return $this->location_title;
    }


    public function getCategoryTitle(): string
    {
        if (!$this->show_category) {
            return '';
        }
        return $this->category_title;
    }

    public function getJobType(): string
    {
        if (!$this->show_type_of_work) {
            return '';
        }
        return $this->type_of_work_title;
    }

    public function getTeam(): string
    {
        if (!$this->show_team) {
            return '';
        }
        return $this->team_title;
    }

    public function getMoney(): string
    {
        if (!$this->show_money) {
            return '';
        }
        return $this->money;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id_external');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id_external');
    }

}
