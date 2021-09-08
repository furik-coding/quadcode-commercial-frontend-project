<?php

use App\Http\Controllers\FeedbackController;
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

Route::get('/{locale}/contact', [FeedbackController::class, 'createForm'])->name('contact');

Route::post('/contact', [FeedbackController::class, 'sendForm'])->name('contact.store');

// add locale to old contact urls
//Route::redirect('/contact', "/" . App::getLocale() . "/contact");

Route::get('/sitemap', ['\App\Http\Controllers\Controller', 'sitemap']);

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
