<?php

    namespace Jarvis\Facades;

    use Illuminate\Support\Facades\Facade;

    class Jarvis extends Facade
    {
        protected static function getFacadeAccessor()
        {
            return \Jarvis\JarvisRepository::class;
        }
    }
