<?php

    namespace Ultron\Facades;

    use Illuminate\Support\Facades\Facade;

    class Ultron extends Facade
    {
        protected static function getFacadeAccessor()
        {
            return \Ultron\UltronRepository::class;
        }
    }
