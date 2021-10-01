<?php

namespace Alishplugins\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Alishplugins\Modules\Contracts\RepositoryInterface;
use Alishplugins\Modules\Laravel\LaravelFileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, LaravelFileRepository::class);
    }
}
