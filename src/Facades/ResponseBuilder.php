<?php

namespace Prem\ResponseBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class ResponseBuilder extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'response_builder';
    }
}
