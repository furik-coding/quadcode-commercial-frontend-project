<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use Illuminate\Support\Facades\Config;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';

    protected $permalinkBase = '';

    protected function getPermalinkBaseUrl()
    {
        $appUrl = Config::get('app.url');

        if (blank(parse_url($appUrl)['scheme'] ?? null)) {
            $appUrl = $this->request->getScheme() . '://' . $appUrl;
        }

        return $appUrl . '/'
            . ($this->moduleHas('translations') ? '{language}/' : '')
            . ($this->moduleHas('revisions') ? '{preview}/' : '')
            . ($this->permalinkBase ?? $this->moduleName)
            . (isset($this->permalinkBase) && empty($this->permalinkBase) ? '' : '/');
    }
}
