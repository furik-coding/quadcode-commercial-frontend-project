<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Team;

class TeamRepository extends ModuleRepository
{
    use HandleTranslations, HandleMedias;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    public static function getData()
    {
        return Team::withActiveTranslations()->published()->get();
    }
}
