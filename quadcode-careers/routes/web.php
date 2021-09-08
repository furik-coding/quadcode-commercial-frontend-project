<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home')->get('/', function () {

    $page = app(\App\Repositories\PageRepository::class)->find(1);

    abort_unless($page, 404);

    return view('site.welcome', [
        'item' => $page,
    ]);
});

Route::get('/sitemap', ['\App\Http\Controllers\Controller', 'sitemap']);

Route::get('/gallery/{path}', 'Controller@gallery')->where('path', '.*');

Route::name('set_locale')->get('/locale/{locale}', function ($locale) {

    $cookie = null;

    if (in_array($locale, config('translatable.locales'))) {
        $cookie = \Illuminate\Support\Facades\Cookie::forever('locale', $locale);
    }

    if ($cookie) {
        return \Illuminate\Support\Facades\Redirect::home()->withCookie($cookie);
    }

    return back();
});

Route::name('application')->get('/{locale}/application/{vacancy?}', ['\App\Http\Controllers\Controller', 'application']);
Route::name('application.store')->post('/application', ['\App\Http\Controllers\Controller', 'applicationStore']);

Route::name('search')->get('/{locale}/search', ['\App\Http\Controllers\Controller', 'index']);

Route::name('location.show')->get('/{locale}/locations/{slug}', function ($locale, $slug) {

    if (in_array($locale, config('translatable.locales'))) {
        app()->setLocale($locale);
    }

    $page = app(\App\Repositories\LocationRepository::class)->forSlug($slug);

    abort_unless($page, 404);

    return view('site.location', [
        'item' => $page,
    ]);
});

Route::name('category.show')->get('/{locale}/job-categories/{slug}', function ($locale, $slug) {

    if (in_array($locale, config('translatable.locales'))) {
        app()->setLocale($locale);
    }

    $page = app(\App\Repositories\CategoryRepository::class)->forSlug($slug);

    abort_unless($page, 404);

    return view('site.category', [
        'item' => $page,
    ]);
});

Route::name('job.show')->get('/{locale}/job/{slug}', function ($locale, $slug) {

    if (in_array($locale, config('translatable.locales'))) {
        app()->setLocale($locale);
    }

    $vacancy = app(\App\Repositories\VacancyRepository::class)->forSlug($slug);

    abort_unless($vacancy, 404);

    return view('site.vacancy', [
        'item' => $vacancy,
    ]);
});

Route::name('page.show')->get('/{locale}/{slug}', function ($locale, $slug) {

    if (in_array($locale, config('translatable.locales'))) {
        app()->setLocale($locale);
    }

    $page = app(\App\Repositories\PageRepository::class)->forSlug($slug);

    abort_unless($page, 404);

    if ($page->redirect) {
        return redirect()->route('page.show', ['locale' => $locale, 'slug' => $page->slug]);
    }

    return view('site.page', [
        'item' => $page,
    ]);
});
