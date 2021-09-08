<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\Team;

class TeamTranslation extends Model
{
    protected $baseModuleModel = Team::class;
}
