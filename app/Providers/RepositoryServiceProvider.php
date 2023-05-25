<?php

namespace App\Providers;

use App\Repositories\LinkRepository;
use App\Repositories\ClientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\FeelLockyRepository;
use App\Repositories\Interfaces\LinkRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\FeelLockyRepositoryInterface;

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

        $this->app->bind(
            FeelLockyRepositoryInterface::class,
            FeelLockyRepository::class,
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
