<?php
    namespace Ultron\Providers;

    use Illuminate\Support\ServiceProvider;
    use Ultron\UltronRepository;

    class UltronServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton('ultron', function () {
                return new UltronRepository();
            });
        }

        public function boot()
        {
            // Se quiser publicar configs no futuro
        }
    }
