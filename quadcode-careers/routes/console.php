<?php

use App\Api\Huntflow;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('huntflow:me', function (Huntflow $huntflow) {
    echo $huntflow->getMe();
})->describe('Show info about current huntflow user');

Artisan::command('huntflow:accounts', function (Huntflow $huntflow) {
    echo $huntflow->getAccounts();
})->describe('Show info about available accounts for current user');

Artisan::command('huntflow:applicant:sources', function (Huntflow $huntflow) {
    echo $huntflow->getApplicantSources();
})->describe('Show info about available applicant sources');

Artisan::command('huntflow:vacancies:statuses', function (Huntflow $huntflow) {
    echo $huntflow->getVacancyStatuses();
})->describe('Show info about available vacancy statuses');
Artisan::command('huntflow:vacancies:list', function (Huntflow $huntflow) {
    echo $huntflow->getVacancyList();
})->describe('Get vacancy list');
Artisan::command('huntflow:vacancies:get {id}', function (int $id, Huntflow $huntflow) {
    echo $huntflow->getVacancy($id);
})->describe('Get vacancy by id');
Artisan::command('huntflow:categories:list', function (Huntflow $huntflow) {
    var_dump($huntflow->getDictionary('category'));
})->describe('Get categories list');
Artisan::command('huntflow:categories:update', function (Huntflow $huntflow, \App\Repositories\CategoryRepository $repository) {
    $categories = $huntflow->getDictionary('category');
    $results = [
        'skip' => 0,
        'add' => 0,
    ];
    foreach ($categories['fields'] as $category) {
        $result = $repository->updateFromHuntflow($category);
        if ($result) {
            $results['add'] += 1;
        } else {
            $results['skip'] += 1;
        }
    }

    echo 'Skipped: ' . $results['skip'] . "\n";
    echo 'Added: ' . $results['add'] . "\n";

})->describe('Update categories on site from huntflow');
Artisan::command('huntflow:locations:list', function (Huntflow $huntflow) {
    var_dump($huntflow->getDictionary('location'));
})->describe('Get locations list');
Artisan::command('huntflow:locations:update', function (Huntflow $huntflow, \App\Repositories\LocationRepository $repository) {
    $categories = $huntflow->getDictionary('location');
    $results = [
        'skip' => 0,
        'add' => 0,
    ];
    foreach ($categories['fields'] as $category) {
        $result = $repository->updateFromHuntflow($category);
        if ($result) {
            $results['add'] += 1;
        } else {
            $results['skip'] += 1;
        }
    }

    echo 'Skipped: ' . $results['skip'] . "\n";
    echo 'Added: ' . $results['add'] . "\n";

})->describe('Update locations on site from huntflow');
Artisan::command('huntflow:typework:list', function (Huntflow $huntflow) {
    var_dump($huntflow->getDictionary('type_work'));
})->describe('Get type_work list');
