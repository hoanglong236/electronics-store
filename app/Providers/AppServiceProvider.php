<?php

namespace App\Providers;

use App\Repositories\Concretes\AccountRepository;
use App\Repositories\Concretes\CommonRepository;
use App\Repositories\Concretes\HomeRepository;
use App\Repositories\IAccountRepository;
use App\Repositories\ICommonRepository;
use App\Repositories\IHomeRepository;
use App\Services\AccountService;
use App\Services\CommonService;
use App\Services\HomeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // main repositories
        $this->app->bind(ICommonRepository::class, CommonRepository::class);
        $this->app->bind(IAccountRepository::class, AccountRepository::class);
        $this->app->bind(IHomeRepository::class, HomeRepository::class);

        // singletons
        $this->app->singleton(CommonService::class, function () {
            return new CommonService($this->app->make(ICommonRepository::class));
        });

        // normal instances
        $this->app->instance(
            AccountService::class,
            new AccountService(
                $this->app->make(IAccountRepository::class)
            )
        );

        $this->app->instance(
            HomeService::class,
            new HomeService(
                $this->app->make(IHomeRepository::class)
            )
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
