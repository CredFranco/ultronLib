<?php
    namespace Jarvis\Providers;

    use Illuminate\Support\ServiceProvider;
    use Jarvis\JarvisRepository;

    class UltronServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton('jarvis', function () {
                return new JarvisRepository();
            });
        }

        public function boot()
        {
            // Se quiser publicar configs no futuro
        }
    }
