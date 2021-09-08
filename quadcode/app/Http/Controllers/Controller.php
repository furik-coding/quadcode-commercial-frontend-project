<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use Laravelium\Sitemap\Sitemap;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Sitemap $sitemap
     * @return \Laravelium\Sitemap\View
     */
    public function sitemap(Sitemap $sitemap)
    {
        app()->setLocale('en');
        $locales = getLocales();

        $sitemap->setCache('quadcode.sitemap', 60);

        if ($sitemap->isCached()) {
            return $sitemap->render('xml');
        }

        $sitemap->add(URL::route('home'), Carbon::now(), '1.0', 'weekly');

        $pages = PageRepository::getSitemapData();
        foreach ($pages as $page) {
            $translations = [];
            foreach ($locales as $locale) {
                $translations[] = ['language' => $locale, 'url' => URL::route('page.show', [$locale, $page->slug])];
            }

            $sitemap->add(URL::route('page.show', ['en', $page->slug]), $page->updated_at, '1.0', 'daily', [], null, $translations);
        }

        return $sitemap->render('xml');
    }
}
