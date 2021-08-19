<?php

namespace Suunnn\LaravelRongcloud\Facades;

use Illuminate\Support\Facades\Facade;

class RongCloud extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RongCloud\RongCloud::class;
    }
}
