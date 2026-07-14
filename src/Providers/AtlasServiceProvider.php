<?php

namespace Atlas\Providers;

use Atlas\AtlasRepository;
use Illuminate\Support\ServiceProvider;

class AtlasServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/ultron-lib.php', 'ultron-lib');

        $this->app->singleton('atlas', function () {
            return new AtlasRepository();
        });
    }

    public function boot()
    {
        //
    }
}
