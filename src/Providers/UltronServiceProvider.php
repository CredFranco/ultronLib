<?php

namespace Ultron\Providers;

use Illuminate\Support\ServiceProvider;
use Ultron\UltronRepository;

class UltronServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/ultron-lib.php', 'ultron-lib');

        $this->app->singleton('ultron', function () {
            return new UltronRepository();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/ultron-lib.php' => config_path('ultron-lib.php'),
        ], 'ultron-lib-config');
    }
}
