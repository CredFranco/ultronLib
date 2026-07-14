<?php

namespace Jarvis\Providers;

use Illuminate\Support\ServiceProvider;
use Jarvis\JarvisRepository;

class JarvisServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/ultron-lib.php', 'ultron-lib');

        $this->app->singleton('jarvis', function () {
            return new JarvisRepository();
        });
    }

    public function boot()
    {
        //
    }
}
