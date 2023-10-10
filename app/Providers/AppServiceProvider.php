<?php

namespace App\Providers;

use App\Services\Branch\BranchService;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Branch\BranchRepositoryImplement;
use App\Repositories\Api\ProvinceRepository;
use App\Repositories\Api\ProvinceRepositoryImplement;
use App\Repositories\Api\DistrictsRepository;
use App\Repositories\Api\DistrictsRepositoryImplement;
use App\Repositories\Api\SubDistrictsRepository;
use App\Repositories\Api\SubDistrictsRepositoryImplement;
use App\Repositories\Api\UrbansRepository;
use App\Repositories\Api\UrbansRepositoryImplement;
use App\Repositories\Visit\VisitRepository;
use App\Repositories\Visit\VisitRepositoryImplement;
use App\Services\Branch\BranchServiceImplements;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BranchRepository::class, BranchRepositoryImplement::class);
        $this->app->bind(ProvinceRepository::class, ProvinceRepositoryImplement::class);
        $this->app->bind(DistrictsRepository::class, DistrictsRepositoryImplement::class);
        $this->app->bind(SubDistrictsRepository::class, SubDistrictsRepositoryImplement::class);
        $this->app->bind(UrbansRepository::class, UrbansRepositoryImplement::class);
        $this->app->bind(VisitRepository::class, VisitRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
