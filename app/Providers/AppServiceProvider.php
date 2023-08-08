<?php

namespace App\Providers;

use App\Repositories\Concretes\AccountRepository;
use App\Repositories\IAccountRepository;
use App\Services\AccountService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAccountRepository::class, AccountRepository::class);

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
