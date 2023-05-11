<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ClientRepository;
use App\Repositories\LinkRepository;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\LinkRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LinkRepositoryInterface::class,
            LinkRepository::class,
        );
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
