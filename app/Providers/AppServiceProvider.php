<?php

namespace App\Providers;

use App\Repositories\Concretes\AccountRepository;
use App\Repositories\Concretes\CommonRepository;
use App\Repositories\IAccountRepository;
use App\Repositories\ICommonRepository;
use App\Services\AccountService;
use App\Services\CommonService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
