<?php
    namespace Atlas\Providers;

    use Atlas\AtlasRepository;
    use Illuminate\Support\ServiceProvider;

    class AtlasServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton('atlas', function () {
                return new AtlasRepository();
            });
        }

        public function boot()
        {
            // Se quiser publicar configs no futuro
        }
    }
