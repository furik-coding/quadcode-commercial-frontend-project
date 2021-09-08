<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\LocationRepository;
use App\Repositories\VacancyRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Huntflow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'huntflow:vacancies:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update vacancies on site from Hunflow';

    private $huntflow;
    private $vacancyRepository;
    private $locationRepository;
    private $categoryRepository;

    /**
     * Create a new command instance.
     *
     * @param \App\Api\Huntflow $huntflow
     * @param VacancyRepository $vacancyRepository
     */
    public function __construct(\App\Api\Huntflow $huntflow, VacancyRepository $vacancyRepository, LocationRepository $locationRepository, CategoryRepository $categoryRepository)
    {
        $this->huntflow = $huntflow;
        $this->vacancyRepository = $vacancyRepository;
        $this->locationRepository = $locationRepository;
        $this->categoryRepository = $categoryRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $page = 1;
        $ids = [];
        do {
            $rawResult = $this->huntflow->getVacancyList($page);
            if (!$rawResult) {
                break;
            }
            $result = $rawResult['items'];

            foreach ($result as $item) {
                if (!$this->shouldBeImported($item)) {
                    continue;
                }
                $ids[] = $item['id'];
            }

            $page += 1;
            if ($page % 10 == 0) {
                sleep(1);
            }
        } while ($result);

        if (!$ids) {
            echo 'Nothing to update';
            return;
        }

        $this->updateVacanciesByIds($ids);
    }

    /**
     * Skip closed, hidden and disabled positions
     * @param $item
     * @return bool
     */
    private function shouldBeImported($item): bool
    {
        if ($item['state'] != 'OPEN') {
            return false;
        }
        if ($item['hidden'] != false) {
            return false;
        }
        return true;
    }

    /**
     * @param array $ids
     */
    private function updateVacanciesByIds(array $ids)
    {
        DB::beginTransaction();
        $this->vacancyRepository->truncate();

        foreach ($ids as $i => $id) {
            $result = $this->huntflow->getVacancy($id);
            $this->vacancyRepository->updateFromHuntflow($result);

            if ($i % 10 == 0) {
                sleep(1);
            }
        }

        $this->locationRepository->updateVacancyCount();
        $this->categoryRepository->updateVacancyCount();
        DB::commit();
    }
}
