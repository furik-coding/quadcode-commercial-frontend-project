<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelper;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Vacancy;
use App\Repositories\CategoryRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PageRepository;
use App\Repositories\VacancyRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use Laravelium\Sitemap\Sitemap;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(
        Request $request,
        VacancyRepository $vacancyRepository,
        LocationRepository $locationRepository,
        CategoryRepository $categoryRepository,
        $locale
    )
    {
        if (in_array($locale, config('translatable.locales'))) {
            app()->setLocale($locale);
        }

        $page = app(\App\Repositories\PageRepository::class)->forSlug('search');

        abort_unless($page, 404);

        $filters = [
            'locations' => [],
            'categories' => [],
        ];
        $filterUri = [app()->getLocale()];

        $vacancies = Vacancy::query();

        if ($request->has('location')) {
            $value = $request->get('location');
            if (!is_array($value)) {
                $value = [$value];
            }
            $value = array_filter($value, function ($item) { return is_numeric($item); });
            $vacancies->whereIn('location_id', $value);
            $filters['locations'] = $locationRepository->getListByIds($value);
            if ($filters['locations']->count()) {
                $filterUri['location'] = $filters['locations']->keys()->toArray();
            }
        }

        if ($request->has('category')) {
            $value = $request->get('category');
            if (!is_array($value)) {
                $value = [$value];
            }
            $value = array_filter($value, function ($item) { return is_numeric($item); });
            $vacancies->whereIn('category_id', $value);
            $filters['categories'] = $categoryRepository->getListByIds($value);
            if ($filters['categories']->count()) {
                $filterUri['category'] = $filters['categories']->keys()->toArray();
            }
        }

        if ($request->has('keywords')) {
            $fields = ['position', 'title', 'requirements', 'position', 'body', 'about_team', 'tasks'];
            $keywords = '%' . trim($request->get('keywords')) . '%';
            $vacancies->where(function ($query) use ($fields, $keywords) {
                foreach ($fields as $field) {
                    $query->orWhere($field, 'ilike', $keywords);
                }
            });
        }

        $stats = $vacancyRepository->getPositionStats($vacancies);

        $pageSize = 10;
        $result = CollectionHelper::paginate($vacancies->get(), $pageSize);

        if ($request->ajax()) {
            return response()->json($result);
        }

        return view('site.search', [
            'stats' => $stats,
            'item' => $page,
            'vacancies' => $result,
            'filters' => $filters,
            'filterUri' => $filterUri,
        ]);
    }


    public function application(Request $request, $locale, $vacancy = null)
    {
        if (in_array($locale, config('translatable.locales'))) {
            app()->setLocale($locale);
        }


        return view('site.application', [
            'vacancy' => $vacancy,
            'success' => null,
        ]);
    }


    public function applicationStore(ApplicationRequest $request)
    {
        $validated = $request->validated();

        $application = new Application();

        $result = $application->send($validated);

        if ($request->ajax()) {
            return response()->json(
                ['success' => $result,]
            );
        }

        return view('site.application', [
            'vacancy' => null,
            'success' => $result,
        ]);
    }

    /**
     * Gallery thumbs generator
     * @param Filesystem $filesystem
     * @param $path
     * @return mixed
     */
    public function gallery(Filesystem $filesystem, $path)
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => public_path(File::dirname($path)),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'gallery',
        ]);

        return $server->getImageResponse(File::basename($path), request()->all());
    }

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

        $locations = LocationRepository::getSitemapData();
        foreach ($locations as $location) {
            $translations = [];
            foreach ($locales as $locale) {
                $translations[] = ['language' => $locale, 'url' => URL::route('location.show', [$locale, $location->slug])];
            }

            $sitemap->add(URL::route('location.show', ['en', $location->slug]), $location->updated_at, '1.0', 'daily', [], null, $translations);
        }

        $categories = CategoryRepository::getSitemapData();
        foreach ($categories as $category) {
            $translations = [];
            foreach ($locales as $locale) {
                $translations[] = ['language' => $locale, 'url' => URL::route('category.show', [$locale, $category->slug])];
            }

            $sitemap->add(URL::route('category.show', ['en', $category->slug]), $category->updated_at, '1.0', 'daily', [], null, $translations);
        }

        $vacancies = VacancyRepository::getSitemapData();
        foreach ($vacancies as $vacancy) {
            $translations = [];
            foreach ($locales as $locale) {
                $translations[] = ['language' => $locale, 'url' => URL::route('job.show', [$locale, $vacancy->id])];
            }

            $sitemap->add(URL::route('job.show', ['en', $vacancy->id]), $vacancy->updated_at, '1.0', 'daily', [], null, $translations);
        }

        return $sitemap->render('xml');
    }
}
